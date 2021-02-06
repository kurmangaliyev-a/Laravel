<!doctype html>
<html lang="en">
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
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
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
@if(isset($_GET['search']))
    @if(count($posts)>0)
            <h2>Результаты поиска по запросу "<?=$_GET['search']?>"</h2>
        @else
        <h2>По запросу <?=$_GET['search']?> ничего не найдено</h2>
        <a href="{{ route('post.index') }}" class="btn">Отобразить все посты</a>
    @endif
    @endif
    <div class="row">
        @foreach($posts as $post)
        <div class="col-6">
            <div class="card">
                <div class="card-header"><h2>{{$post->short_title}}</h2></div>
                <div class="card-body">
                    <div class="card-img" style="background-image: url({{ $post->img ?? asset('img/default.jpg')}});"></div>
                    <div class="card-author">Автор: {{$post->name}}</div>
                    <a href="#" class="btn-outline-primary">Посмотреть пост </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div style="margin:50px;">
    {{$posts->links()}}
</div>
</body>
</html>
