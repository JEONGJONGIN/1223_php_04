<?php
// 0. SESSION開始！！
session_start();

require_once('funcs.php');
login_check(); //ログインチェック処理

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$name = $_POST['name'];
$artist = $_POST['artist'];
$pop = $_POST['pop'];
$genre = $_POST['genre'];
$url = $_POST['url'];
$comment = $_POST['comment'];

// DB接続します
$pdo = db_conn();

//2. DB接続します ->関数にて対応ずみ
// try {

//   //ID:'root', Password: xamppは 空白 ''
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');

// } catch (PDOException $e) {

//   exit('DBConnectError:'.$e->getMessage());

// }

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare('
  INSERT INTO 
    gs_am_table(id, name, artist, pop, genre, url, comment, date)
  VALUES (
    NULL, :name, :artist, :pop, :genre, :url, :comment, sysdate()
    ); ');

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
$stmt->bindValue(':pop', $pop, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．index.phpへリダイレクト
  // 成功した場合
  // echo 'test';
  redirect('index.php');
}
?>

