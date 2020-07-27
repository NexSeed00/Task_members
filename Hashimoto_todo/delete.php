<?php 
	require_once('dbconnect.php');
	require_once('function.php');

	$id = h($_POST['id']);
	var_dump($id);

	// SQL文
	$sql = 'DELETE FROM tasks WHERE id ="'.$id.'" ';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	header('location:index.php');
?>