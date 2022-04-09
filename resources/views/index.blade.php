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
           <td>{{$product->title}}</td>
            <a href="products/edit">編集</a>
                <img src="{{ '/storage/' . $product['image']}}" class='w-100 mb-3'/>
            <td>{{$product->create_at}}</td>

        @endforeach
    </ul>
</body>
</html>