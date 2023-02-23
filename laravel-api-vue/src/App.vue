<script>

import axios from 'axios';

const API_URL = 'http://localhost:8000/api/v1/';

export default {

  data() {

    return {
      force_update: false,
      movies_bk: [],
      movies: [],
      genres: [],
      tags: [],
      movie_name: '',
      movie_year: '',
      movie_cashOut: '',
      movie_genre: '',
      movie_tags: [],
      movie_creating: false,
      movie_updating: -1,

      test: true
    }
  },

  methods: {

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

    updateMovies() {
      axios.get(API_URL + 'movie/all')
        .then(res => {

          const data = res.data;
          const success = data.success;
          const movies = data.response;

          if (success) {
            this.movies = movies;
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
