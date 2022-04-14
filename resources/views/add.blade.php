
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @extends("layouts.app")
    @section('content')
    <section class="hero is-success">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    新規投稿作成
                </h1>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="column id-6">
            <form action="/create" method="post" enctype="multipart/form-data">
                <table>
                    @csrf
                    アプリのタイトル
                          <input class="form-control" type="text" name="title">
                    アプリの画像
                        <div class="field">
                          <input type="file" name="thefile" class="input">
                        </div>

                    アプリの説明
                        <textarea name="content" class="form-control" rows="10">
                        </textarea>
                    
                        制作期間
                          <input class="form-control" type="number" name="span" >
                          ジャンル
                          <input class="form-control" type="text" name="genre">
                          技術
                          <input class="form-control" type="text" name="tech" >
                          Githubのリンク
                          <input class="form-control" type="text" name="github">
                          アプリのリンク
                          <input class="form-control" type="text" name="link"> 
                </table>
                <button class="btn btn-primary btn-lg text-center">投稿</button>
            </form>
            </div>
        </div>
    </section>
</form>
@endsection

</body>
</html>


