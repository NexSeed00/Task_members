<?php
    require_once('dbconnect.php');

    // データの受取
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    // データの作成(投稿時間)
    $currentTime = date("Y/m/d H:i:s");

    // PDOがあるから使用可能
    // prepare()
    // execute()

    // DBへフォームで受け取ったデータを保存するため
    // データを保存するSQL文（insert文）
    $stmt = $dbh->prepare('INSERT INTO tasks (title, contents, created) VALUES (?, ?, ?)');
    $stmt->execute([$title, $contents, $currentTime]);//?を変数に置き換えてSQLを実行

    // リダイレクト
    header('location: index.php');
