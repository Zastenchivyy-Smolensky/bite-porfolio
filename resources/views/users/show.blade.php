@extends("layouts.app")
@section("content")
    <div class="container mt-4">
        <div class="mb-4">
            <p>{{$user_name}}の投稿一覧</p>
        </div>
        @foreach($products as $product)
        
        <div class="album py-5 bg-light">
            <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
           <img src="{{ '/storage/' . $product['image']}}" class='img-thumbnail' width="100%" height="225"/>
            <div class="card-body">
                <p class="card-text">
                    タイトル:{{$product->title}} <br>
                    投稿者: {{ $user_name }}
                </p>
              <p class="card-text">{{ \Illuminate\Support\Str::limit($product->content, 140) }}</p>
              <a class="card-link" href="{{ route('product.show', ['id'=>$product->id]) }}">
                        続きを読む
                </a>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"> <a href="{{ route('product.show', ['id'=>$product->id]) }}" >View</a></button>
                  @if($user_id == $product->user_id)
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('edit', ['id'=>$product->id]) }}" >Edit</a></button>
                  @endif
                  </div>
                <small class="text-muted">
                    <span class="mr-2">
                        投稿日時 {{ $product->created_at->format('Y.m.d') }}
                    </span>
                </small>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
            {{ $products->links() }}
        </div>
    </div>
@endsection