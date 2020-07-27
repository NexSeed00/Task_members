<?php
	require_once('dbconnect.php');
	require_once('function.php');  
	
    // データの受取
    $title = h($_POST['title']);
    $contents = h($_POST['contents']);
    
    // データの作成(投稿時間)
	$currentTime = date("Y/m/d H:i:s");
	
    // データを保存するSQL文（insert文）
    $stmt = $dbh->prepare('INSERT INTO tasks (title, contents, created) VALUES (?, ?, ?)');
	$stmt->execute([$title, $contents, $currentTime]);

	// リダイレクト
	header('location: index.php');
?>