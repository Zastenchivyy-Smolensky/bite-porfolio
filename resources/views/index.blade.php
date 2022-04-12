<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('/dist/css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @extends("layouts.app")
    @section('content')
    <section class="hero is-success">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    作品一覧
                </h1>
            </div>
        </div>
    </section>
    <div id="vue-root"></div>

    <section class="section">
        <div class="container">
            <div class="columns is-multiline">
                @foreach($products as $product)
                    <div class="column is-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-image" style="width: 18rem">
                                <img src="{{ '/storage/' . $product['image']}}" class='img-thumbnail' width="100%" height="180"/>
                                    <div class="card-body">
                                        <div class="card-title">
                                            投稿者: <a href="{{route('users.show', $product->user_id)}}">{{$user_id}}</a>
                                        </div>
                                        <p class="card-text">{{$product->content}}</p>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="{{ route('product.show', ['id'=>$product->id]) }}" >View</a></button>
                                            @if($user_id == $product->user_id)
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('product.edit', ['id'=>$product->id]) }}" >Edit</a></button>
                                        </div>
                                        <form action="{{route('product.delete',['id'=>$product->id])}}" method="post">
                                            @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">削除</button>
                                        @endif
                                    @auth    
                                        @if(!$product->isLikedBy(Auth::user()))
                                            <span class="likes">
                                                <i class="fas fa-heart like-toggle" data-product-id="{{ $product->id }}"></i>
                                                <span class="like-counter">{{$product->likes_count}}</span>
                                            </span>
                                        @else
                                            <span class="likes">
                                                <i class="far fa-heart like-toggle liked" data-product-id="{{ $product->id }}"></i>
                                                    <span class="like-counter">{{$product->likes_count}}</span>
                                            </span>
                                        @endif
                                    @endauth
                                    <p class="card-text">
                                        <small class="text-muted">
                                        投稿日時 {{ $product->created_at->format('Y.m.d') }}
                                        </small>
                                    </p>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
</body>
</html>