<?php

require_once('dbconnect.php');

$id = $_POST['id'];

$stmt = $dbh->prepare('DELETE FROM tasks WHERE id="'. $id .'"');
$stmt->execute();

// リダイレクト
header('location: index.php');

?>