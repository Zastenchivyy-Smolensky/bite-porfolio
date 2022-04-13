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
    
    <div class="text-center">
        <img src="{{ '/storage/' . $products['image']}}" class='img-thumbnail' width="500" height="180"/>
    </div>
        <div class="card-body">
            <div class="text-center">
                <h5 class="card-title">
                    <div class="media">
                    投稿者: <a href="{{route('users.show', $products->user_id)}}">{{$products->user->name}}</a> <br>

                        アプリのタイトル<br>
                        {{$products["title"]}}
                    </div>
                </h5>
                <p class="card-text">
                    アプリの説明<br>
                    {{$products["content"]}}
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        投稿日{{ $products->created_at->format('Y.m.d') }}
                    </small>
                </p>
            </div>
        </div>
    @endsection

</body>
</html>