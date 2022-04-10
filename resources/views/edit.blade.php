<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div class="container small">
       <h1>プロダクトの編集</h1>
          <div class="card w-100">
              <div class="card-header">メモの編集</div>
              <div class="card-body">
                  <form method="post" action="{{route('update',['id'=>$product['id'] ])}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <input type="text" name="title" value="{{$product['title']}}">

                          <textarea name="content" class="form-control" rows="10">
                              {{$product["content"]}}
                          </textarea>
                          <input type="number" name="span" value="{{$product['span']}}">
                          <input type="text" name="genre" value="{{$product['genre']}}">
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">
                          更新
                      </button>
                  </form>
              </div>
          </div>
   </div>
</body>
</html>