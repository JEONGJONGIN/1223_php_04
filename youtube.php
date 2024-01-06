<?php
// 0. SESSION開始！！
session_start();

//1.  DB接続します
require_once('funcs.php');
login_check(); //ログインチェック処理

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Youtube Video Search</title>
</head>
<body>
  <div class="container">
    <br>
    <h1>Mini Youtube</h1>
    <br>
    <form id="form">
      <div class="form-group">
        <input type="text" class="form-control" id="search">
      </div>
      <br>
      <div class="form-group"> 
        <input type="submit" class="btn btn-danger" value="Search" id="search-btn">
        <input type="button" class="btn btn-danger" value="戻る" onclick="location.href='index.php'">
      </div>
    </form>
    <br>
    <div class="row">
        <div class="col-md-12">
          <div id="videos"></div>
        </div>
    </div>

  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="./js/script.js"></script>
</html>