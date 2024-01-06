<?php
// 0. SESSION開始！！
session_start();
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */
//2.をfuncs.phpでまとめる方法
require_once('funcs.php');
login_check(); //ログインチェック処理
$pdo = db_conn();

$id = $_GET['id'];

// try {
//     $db_name = 'gs_db3';    //データベース名
//     $db_id   = 'root';      //アカウント名
//     $db_pw   = '';      //パスワード：MAMPは'root'
//     $db_host = 'localhost'; //DBホスト
//     $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
// } catch (PDOException $e) {
//     exit('DB Connection Error:' . $e->getMessage());
// }

//２．データ登録SQL作成

$stmt = $pdo->prepare('SELECT * FROM gs_am_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
        //成功した場合
      $result = $stmt->fetch();
}
/**
 * [ここでやりたいこと]
 * 1. クエリパラメータの確認 = GETで取得している内容を確認する
 * 2. select.phpのPHP<?php ?>の中身をコピー、貼り付け
 * 3. SQL部分にwhereを追加
 * 4. データ取得の箇所を修正。
 */



?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
(入力項目は「登録/更新」はほぼ同じになるから)
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

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
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>Music Bank
                </legend>
                <label>曲名：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
                <label>アーティスト名：<input type="text" name="artist" value="<?= $result['artist']?>"></label><br>
                <label>ジャンル①：<select name="pop" value="<?= $result['pop']?>">
                    <option value="Pop">Pop</option>
                    <option value="K-Pop">K-Pop</option>
                    <option value="J-Pop">J-Pop</option>
                    <option value="Others">Others</option>                    
                </select><br>
                <label>ジャンル②：<select name="genre" value="<?= $result['genre']?>">
                    <option value="ballade">ballade</option>
                    <option value="dance">dance</option>
                    <option value="hip-hop">hip-hop</option>
                    <option value="R＆B">R＆B</option>
                    <option value="ROCK">ROCK</option>
                    <option value="Others">Others</option>
                </select><br>
                <label>YouTube URL：<input type="text" name="url" value="<?= $result['url']?>"></label><br>
                <label><textArea name="comment" rows="4" cols="40"><?= $result['comment']?></textArea></label><br>

                <input type="hidden" name ="id" value="<?= $result['id']?>">  <!--更新の際、「id」取得のため ※type:hiddenで設定することでhtml画面には表示されない様にする。-->

                <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>

</html>