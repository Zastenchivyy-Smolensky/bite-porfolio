<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends("layouts.app")
@section('content')

   <div class="container small">
       <h1>プロダクトの編集</h1>
          <div class="card w-100">
              <div class="card-header">プロダクトを編集してくだいさい</div>
              <div class="card-body">
                  <form method="post" action="{{route('product.edit',['id'=>$product['id'] ])}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          アプリのタイトル
                          <input class="form-control" type="text" name="title" value="{{$product['title']}}">
                          アプリの画像
                        <div class="field">
                        　<input type="file" name="thefile" class="input">
                        </div>
                            アプリの説明
                          <textarea name="content" class="form-control" rows="10">
                              {{$product["content"]}}
                          </textarea>
                        制作期間
                          <input class="form-control" type="number" name="span" value="{{$product['span']}}">
                          ジャンル
                          <input class="form-control" type="text" name="genre" value="{{$product['genre']}}">
                          技術
                          <input class="form-control" type="text" name="tech" value="{{$product['tech']}}">
                          Githubのリンク
                          <input class="form-control" type="text" name="github" value="{{$product['github']}}">
                          アプリのリンク
                          <input class="form-control" type="text" name="link" value="{{$product['link']}}"> 
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">
                          更新
                      </button>
                  </form>
              </div>
          </div>
   </div>
   @endsection

</body>
</html>