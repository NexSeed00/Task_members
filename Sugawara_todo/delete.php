<?php
	require_once('dbconnect.php'); 
	
    // データの受取
    $id = $_POST['id'];
	
    // データを削除するSQL文（insert文）
    $stmt = $dbh->prepare('DELETE FROM tasks WHERE `id`=?');
	$stmt->execute([$id]);

	// リダイレクト
	header('location: index.php');
?>