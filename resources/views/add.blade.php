<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/create" method="post" enctype="multipart/form-data">
    <table>
        @csrf
        <tr>
            <th>title:</th>
            <td>
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <th>content:</th>
            <td>
                <input type="text" name="content">
            </td>
        </tr>

        <tr>
            <th>span:</th>
            <td>
                <input type="number" name="span">
            </td>
        </tr>

        <tr>
            <th>image:</th>
            <td>
                <input type="file" name="image">
            </td>
        </tr>
        <tr>
            <th>genre:</th>
            <td>
                <input type="text" name="genre">
            </td>
        </tr>
    </table>
    <button>投稿</button>
</form>
</body>
</html>


