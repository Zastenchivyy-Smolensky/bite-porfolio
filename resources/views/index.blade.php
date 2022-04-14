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
                                            投稿者: <a href="{{route('users.show', $product->user_id)}}">{{$product->user->name}}</a>
                                        </div>
                                        <p class="card-text">{{$product->title}}</p>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="{{ route('product.show', ['id'=>$product->id]) }}" >View</a></button>
                                            @if($user_id == $product->user_id)
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('edit', ['id'=>$product->id]) }}" >Edit</a></button>
                                        </div>
                                        <form action="{{route('product.delete',['id'=>$product->id])}}" method="post">
                                            @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">削除</button>
                                        @endif
                                        </form>

                                        <div class="row justify-content-center">
                                            <div class="col-md-3">
                                                <form action="">
                                                    <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="">
                                                <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                                            </form>
                                        </div>

                                    <p class="card-text">
                                        <small class="text-muted">
                                        投稿日時 {{ $product->created_at->format('Y.m.d') }} <br>
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
<script src="{{ mix('js/like.js') }}"></script>
</body>
</html>