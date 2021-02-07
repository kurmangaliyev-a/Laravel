<!doctype html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Главная</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('post.create') }}">Создать пост</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="/" tabindex="-1" aria-disabled="true">Создать пост</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/" tabindex="-1" aria-disabled="true">Удалить пост</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/" tabindex="-1" aria-disabled="true">Создать пост</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="/" tabindex="-1" aria-disabled="true">Создать пост</a>
                </li>
            </ul>
            <form class="form-inline me-2 my-lg-0" action="{{ route('post.index') }}">
                <input class="form-control me-2"  name="search" type="search" placeholder="Найти пост..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    @yield('content')


</div>

<script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>
