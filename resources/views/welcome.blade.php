<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @auth
        <a href="{{ route('photo.index')}}">Photo</a>
        <a href="{{ route('post')}}">POST</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Log out</button>
        </form>
    @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endauth
</body>

</html>
