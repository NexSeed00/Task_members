<?php

require_once('dbconnect.php');

$id = $_POST['id'];
$tsql = "DELETE FROM tasks WHERE id = :id";
$stmt = $dbh->prepare($tsql);
$stmt->execute([":id" => $id]);
