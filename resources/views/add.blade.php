
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
            <form action="/create" method="post" enctype="multipart/form-data">
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
                        <input type="file" name="thefile" class="input">
                    </div>


                    <div class="field">
                        <label class="label">ジャンル</label><br>
                        <input type="text" name="genre" class="input">
                    </div>
                    <div class="field">
                        <label class="label">技術</label><br>
                        <input type="text" name="tech" class="input">
                    </div>

                    <div class="field">
                        <label class="label">githubのリンク</label><br>
                        <input type="text" name="github" class="input">
                    </div>

                    <div class="field">
                        <label class="label">リンク</label><br>
                        <input type="text" name="link" class="input">
                    </div>
                </table>
                <button class="button is-success">投稿</button>
            </form>
            </div>
        </div>
    </section>
    
</form>
</body>
</html>


