<html>
<head>
    <title>List of Comics</title>
</head>
<body>

    <h1>List of Comics</h1>
    <ul>
        @foreach($comics as $comic)
            <li> <a href="{{ route('comics.show', $comic) }}">{{ $comic }}</a></li>
        @endforeach
    </ul>
</body>
</html>