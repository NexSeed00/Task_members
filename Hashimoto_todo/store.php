<?php
	require_once('dbconnect.php');
	require_once('function.php');

	// データの受け取り
	$title = h($_POST['title']);
	$contents = h($_POST['contents']);

	// データ作成(投稿の時間)
	// 日付を取得できる自作関数
	$currentTime = date("Y/m/d H:i:s");

	// ↓PDOがあってこそ使用できる
	// prepare();
	// execute();

	// フォームで受け取ったデータをDBに保存する
	// データを保存するSQL分(insert)
	$stmt = $dbh->prepare('INSERT INTO tasks (title, contents, created) VALUES (?, ?, ?)');
	$stmt->execute([$title, $contents, $currentTime]);//?を変数に置き換えてSQLを実行

	// リダイレクト機能
	header('location:index.php');
?>