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
                    投稿者: <a href="{{route('users.show', $product->user_id}}">
                        {{$user_name}}
                    </a>
                </div>
            </div>
        @endforeach
    </div>