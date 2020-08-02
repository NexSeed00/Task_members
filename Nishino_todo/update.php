<?php
    require_once('dbconnect.php');
    require_once('function.php');

    // データの受け取り
    $id = $_POST['id'];
    $title = h($_POST['title']);
    $contents = h($_POST['contents']);

    // データの更新（投稿時間）
    $currentTime = date("Y/m/d H:i:s");

    // PDOがあるから使用可能
    // prepare()
    // excute()

    // DBへフォームで受け取ったデータを更新するため
    // データを更新するSQL文（update文）
    $stmt = $dbh->prepare("UPDATE tasks SET title = ?, contents = ?, created=? WHERE id = $id");
    $stmt->execute([$title, $contents, $currentTime]);//?を変数に置き換えてSQLを実行

    // リダイレクト
    header('location:index.php');

?>