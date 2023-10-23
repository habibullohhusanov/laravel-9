<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos</title>
</head>

<body>
    <a href="add">Add</a>
    @foreach ($posts as $us)
        <img src="./storage/posts/{{ $us->image }}" width="200" alt="">
        @can('delete', $us)
            <form action="/delete/{{ $us->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
        @canany(['update', 'delete'], $us)
            <form action="/delete/{{ $us->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcanany
    @endforeach
</body>

</html>