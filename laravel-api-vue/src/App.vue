<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {

  data() {

    return {

      movies: [],
      genres: [],
      tags: [],

      movie_name: '',
      movie_year: '',
      movie_cashOut: '',
      movie_genre: '',
      movie_tags: [],

    }
  },

  methods: {

    createMovie(e) {

      e.preventDefault();  //in modo da non refreshare

      const movie = {

        'name': this.movie_name,
        'year': this.movie_year,
        'cashOut': this.movie_cashOut,
        'genre_id': this.movie_genre,
        'tags_id': this.movie_tags,

      };

      axios.post(API_URL + 'movie/store', movie).then(res => {

        const data = res.data;
        const success = data.success;

        if (success) {

          this.clearForms();
          this.updateMovies();

        }

      }).catch(err => console.error(err));

    },

    deleteClick(id) {
      axios.get(API_URL + 'movie/delete/' + id)
        .then(res => {
          const data = res.data;
          const success = data.success;

          if (success) {
            this.updateMovies();
          }
        })
        .catch(err => console.error(err));
    },

    clearForms() {

      this.movie_name = '';
      this.movie_year = '';
      this.movie_cashOut = '';
      this.movie_genre = '';
      this.movie_tags = [];

    },

    updateMovies() {
      axios.get(API_URL + 'movie/all')
        .then(res => {

          const data = res.data;
          const success = data.success;
          const response = data.response;
          const movies = response.movies;
          const genres = response.genres;
          const tags = response.tags;

          if (success) {
            this.movies = movies;
            this.genres = genres;
            this.tags = tags;
          }
        })
        .catch(err => console.error(err));
    }

  },

  mounted() {
    this.updateMovies();
  }

};
</script>

<template>
  <div>
    <h1>
      Movies:
    </h1>
    <form>
      <label for="name">Name</label>
      <input type="text" name="name" v-model="movie_name">
      <br>
      <label for="year">Year</label>
      <input type="number" name="year" v-model="movie_year">
      <br>
      <label for="cashOut">Cash out</label>
      <input type="number" name="cashOut" v-model="movie_cashOut">
      <br>
      <label for="genre_id">Genre</label>
      <select name="genre_id" v-model="movie_genre">
        <option v-for="genre in genres" :key="genre.id" :value="genre.id">
          {{ genre.name }}
        </option>
      </select>
      <br>
      <label>Tag</label>
      <br>
      <div v-for="tag in tags" :key="tag.id">
        <input type="checkbox" @click="updateCheckbox" :value="tag.id" :id="tag.id" v-model="movie_tags">
        <label>{{ tag.name }}</label>
        <br>
      </div>
      <input @click="createMovie" type="submit" value="CREATE NEW MOVIE">
    </form>
    <ul>
      <li v-for="movie in movies" :key="movie.id">
        {{ movie.name }}
        <br>
        <button @click="deleteClick(movie.id)">DELETE</button>
      </li>
    </ul>
  </div>
</template>

<style></style>
