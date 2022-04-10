<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
@extends("layouts.app")
@section('content')

    <section class="hero is-success">
        <div class="hero-body">
            <div class="container">
                <div class="title">
                    詳細ページ
                </div>
            </div>
        </div>
    </section>

    <div class="card mb-3">
    <img src="{{ '/storage/' . $products['image']}}" class='img-thumbnail' width="100%" height="180"/>
        <div class="card-body">
            <h5 class="card-title">{{$products["title"]}}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    @endsection

</body>
</html>