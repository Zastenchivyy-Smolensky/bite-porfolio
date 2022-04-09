<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>profolio</h3>
    <a href='/add'>New</a>
    <ul>
        @foreach($products as $product)
            <p>{{$product->id}}</p>
            <td><a href="{{ route('product.show', ['id'=>$product->id]) }}" class="btn btn-primary">{{$product->title}}</a></td>
            <td><a href="{{ route('product.edit', ['id'=>$product->id]) }}" class="btn btn-info">編集</a></td>
                <img src="{{ '/storage/' . $product['image']}}" class='w-100 mb-3'/>
            <td>
                <form action="{{route('product.delete',['id'=>$product->id])}}" method="post">
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </td>
        @endforeach
    </ul>
</body>
</html>