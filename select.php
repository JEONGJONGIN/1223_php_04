<?php
// 0. SESSION開始！！
session_start();

//1.  DB接続します
require_once('funcs.php');
login_check(); //ログインチェック処理

// DB接続します
$pdo = db_conn();

// try {

//   //ID:'root', Password: xamppは 空白 ''
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');

// } catch (PDOException $e) {

//   exit('DBConnectError:'.$e->getMessage());

// }

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_am_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= '<a href="detail.php?id=' . $result['id'] . '">';
    $view .= h($result['pop']) . " / " . h($result['genre']) . " / " . h($result['artist']) . " " .  
             h('-') . " " . h($result['name']) . " / " . " " . h($result['comment']) . " / " . 
             h($result['date']);
    $view .= "</a>";
    $view .= " // ";
    $view .="<a href='{$result['url']}' target='_blank'>URL</a>";
    if ($_SESSION['kanri_flg'] === 1) {
      $view .= " // ";
      $view .= "<a href='#' onclick=\"deleteRecord({$result['id']})\">[削除]</a>"; //「$view .」の .の意味は while文で上書き上書きせず追記するようにするため入れる。
    } 
    $view .= "</p>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Music Bank格納庫</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>  
</div>
<!-- Main[End] -->

<script>
  function deleteRecord(recordId) {
    // confirm 함수를 사용하여 확인창 표시
    var isConfirmed = confirm("本当に削除しますか？");

    // 사용자가 확인을 눌렀을 경우에만 삭제 진행
    if (isConfirmed) {
      // 삭제 페이지로 이동
      window.location.href = "delete.php?id=" + recordId;
    }
  }
</script>
</body>
</html>