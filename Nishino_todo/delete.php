<?php
    require_once('dbconnect.php');

    // データの受け取り
    $id = $_POST['id'];

    // SQO文を実行
    $sql = "DELETE FROM `tasks` WHERE id = $id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // リダイレクト
    header('location:index.php');

?>