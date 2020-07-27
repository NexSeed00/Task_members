<?php
    require_once('dbconnect.php');

    // データの受け取り
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $id = $_POST['id'];

    $currentTime = date("Y/m/d H:i:s");

    // データ編集するSQL文
    $sql = "UPDATE `tasks` SET `title` = '$title', `contents` = '$contents', `created` = '$currentTime' WHERE `id` = '$id'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // リダイレクト
    header('location:index.php');