<?php
    require_once('dbconnect.php');
    require_once('function.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    $stmt = $dbh->prepare("UPDATE tasks SET title = :title, contents = :contents WHERE id = :id");
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $stmt->bindValue(':contents', $contents, PDO::PARAM_STR);
    $stmt->execute();

    $dbh = null;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アップデート | Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">Todo</a>
                </nav>
            </div>
        </div>

        <div class="row mt-4 px-4">
            <div class="col-12">
                <p>更新しました。</p>
                        <label for="title">Title:</label>
                        <p><?php echo h($title);?></p>
                        <label for="contents">Contents:</label>
                        <p><?php echo h($contents);?></p>
            </div>
        </div>
    </div>


</body>

</html>
