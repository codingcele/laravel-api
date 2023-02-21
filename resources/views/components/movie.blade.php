<li>
    <h4>
        {{ $movie -> name }}
    </h4>
    <h5>
        {{ $movie -> year }}
    </h5>
    <h5>
        {{ $movie -> cashOut }}
    </h5>
    <a href="{{ route('movie.edit', $movie) }}">MODIFY</a> - <a href="{{ route('movie.delete', $movie) }}">DELETE</a>
</li>