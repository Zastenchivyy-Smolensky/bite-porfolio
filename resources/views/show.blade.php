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



                        アプリのタイトル<br>
                        {{$products["title"]}}
                    </div>
                </h5>
                @if($products->user()->where('user_id', Auth::id())->exists())
                    <div class="col-md-3">
                        <form action="({route('product.unlike', $products)})" method="post">
                            @csrf
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-danger">
                        </form>
                    </div>
                @else
                    <div class="col-md-3">
                        <form action="{{route('product.like', $products)}}" method="post">
                            <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                        </form>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <p>いいね数:{{$products->user()->count()}}</p>
                </div>
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