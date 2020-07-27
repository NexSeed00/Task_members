<?php
	require_once('dbconnect.php');
	require_once('function.php');
	
    // データの受取
    $id = h($_POST['id']);
    $title = h($_POST['title']);
    $contents = h($_POST['contents']);

    // データを保存するSQL文（update文）
    $stmt = $dbh->prepare('UPDATE tasks SET `title` = ?, `contents` = ? WHERE `id`= ?');
	$stmt->execute([$title, $contents, $id]);

	// リダイレクト
	header('location: index.php');
?>