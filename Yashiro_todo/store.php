<?php
    require_once('dbconnect.php');

    // データの受け取り
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    $currentTime = date("Y/m/d H:i:s");

    // データ保存するSQL文
    $stmt = $dbh->prepare('INSERT INTO tasks (title, contents, created) VALUES (?, ?, ?)');
    $stmt->execute([$title, $contents, $currentTime]);//?を変数に置き換えてSQLを実行

    // リダイレクト
    header('location:index.php');