<?php 
	require_once('dbconnect.php');
	require_once('function.php');

	$id = h($_POST['id']);
	$title = h($_POST['title']);
	$contents = h($_POST['contents']);

	var_dump($id);
	var_dump($title);
	var_dump($contents);

	$sql = 'UPDATE tasks SET title = "'.$title.'", contents = "'.$contents.'" WHERE id ="'.$id.'" ';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	//?を変数に置き換えてSQLを実行

	// リダイレクト機能
	header('location:index.php');
?>