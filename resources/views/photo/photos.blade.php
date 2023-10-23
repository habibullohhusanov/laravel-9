<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos</title>
</head>

<body>
    <a href="{{ route('photo.create') }}">Add</a>
    @foreach ($photos as $us)
        <img src="./storage/photo/{{ $us->image }}" width="200" alt="">
        @can('delete-photo', $us)
            <form action="{{ route('photo.destroy', ['photo' => $us->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcan
        @canany(['update-photo', 'delete-photo'], $us)
            <form action="{{ route('photo.destroy', ['photo' => $us->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endcanany
    @endforeach
</body>

</html>
