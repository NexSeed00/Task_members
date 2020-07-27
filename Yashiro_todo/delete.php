<?php
    require_once('dbconnect.php');

    // データの受け取り
    $id = $_GET['id'];

    $currentTime = date("Y/m/d H:i:s");

    // データ削除するSQL文
    $sql = "DELETE FROM `tasks` WHERE `id` = '$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // リダイレクト
    header('location:index.php');