<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>詳細ページ</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>タイトル</th>
                <th>投稿日</th>
            </tr>
        </thead>
    <tbody>
        <tr>    
            <td>{{$products->id}}</td>
            <td>{{$products->title}}</td>
            <td>{{$products->create_at}}</td>
        </tr>
    </tbody>
    </table>

</body>
</html>