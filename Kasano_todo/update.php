<?php
    require_once('dbconnect.php');
    require_once('function.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    $stmt = $dbh->prepare('UPDATE tasks SET title="'. h($title) .'", contents="'. h($contents) .'" WHERE id="'. $id .'"');
    $stmt->execute();

    // リダイレクト
    header('location: index.php');

?>

