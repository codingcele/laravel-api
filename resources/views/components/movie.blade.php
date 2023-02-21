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
    <a href="">MODIFY</a> - <a href="{{ route('home.delete', $movie) }}">DELETE</a>
</li>