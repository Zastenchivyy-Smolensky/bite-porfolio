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
       <form action="{{route('product.update',['id'=>$product->id])}}" method="post">
           @csrf
           <fieldset>
                <label for="title">{{ __('アプリのタイトル') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('product.index') }}" class="btn btn-outline-secondary" role="button">
                    <i class="fa fa-reply mr-1" aria-hidden="true"></i>{{ __('一覧画面へ') }}
                </a>
                <button type="submit" class="btn btn-success">
                    {{ __('更新') }}
                </button>
           </fieldset>
       </form>
   </div>
</body>
</html>