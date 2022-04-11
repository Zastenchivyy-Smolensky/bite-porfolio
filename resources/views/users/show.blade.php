@extends("layouts.app");
@section("content")
    <div class="container mt-4">
        <div class="mb-4">
            <p>{{$user_name}}の投稿一覧</p>
        </div>
        @foreach($products as $product)
            <div class="card mb-4">
                <div class="card-header">
                    タイトル:{{$product->title}}
                    投稿者: <a href="{{ route('users.show', $product->user_id) }}">{{ $user_name }}</a>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <li> {{ \Illuminate\Support\Str::limit($product->content, 140) }}
                    </p>
                    <a class="card-link" href="{{ route('product.show', ['id'=>$product->id]) }}">
                        続きを読む
                    </a>

                   
                </div>

                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $product->created_at->format('Y.m.d') }}

                    </span>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $products->links() }}
        </div>
    </div>