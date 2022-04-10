
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    @extends("layouts.app")
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
                <table>
                    @csrf
                    <div class="field">
                        <label class="label">アプリのタイトル</label><br>
                        <input type="text" name="title" class="input">
                    </div>
                    <div class="field">
                        <label class="label">概要</label><br>
                        <input type="text" name="content" class="input">
                    </div>

                    <div class="field">
                        <label class="label">期間</label><br>
                        <input type="number" name="span" class="input">
                    </div>

                    <div class="field">
                        <label class="label">アプリの画像</label><br>
                        <input type="file" name="image" class="input">
                    </div>
                    <div class="field">
                        <label class="label">ジャンル</label><br>
                        <input type="text" name="genre" class="input">
                    </div>
                </table>
            </div>
        </div>
    </section>
    <form action="/create" method="post" enctype="multipart/form-data">
    
    <button class="button is-success">投稿</button>
</form>
</body>
</html>


