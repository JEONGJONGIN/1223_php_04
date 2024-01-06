<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="youtube.php">Youtube検索</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="./insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>Music Bank
                </legend>
                <label>曲名：<input type="text" name="name"></label><br>
                <label>アーティスト名：<input type="text" name="artist"></label><br>
                <label>ジャンル①：<select name="pop">
                    <option value="Pop">Pop</option>
                    <option value="K-Pop">K-Pop</option>
                    <option value="J-Pop">J-Pop</option>
                    <option value="Others">Others</option>                    
                </select></label><br>
                <label>ジャンル②：<select name="genre">
                    <option value="ballade">ballade</option>
                    <option value="dance">dance</option>
                    <option value="hip-hop">hip-hop</option>
                    <option value="R＆B">R＆B</option>
                    <option value="ROCK">ROCK</option>
                    <option value="Others">Others</option>
                </select></label><br>
                <label>YouTube URL：<input type="text" name="url"></label><br>
                <label><textArea name="comment" rows="4" cols="40"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->

</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</html>
