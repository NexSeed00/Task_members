<?php
  require_once('dbconnect.php');

  if (!empty($_GET)) {
    $sql = 'SELECT `title`,`contents` FROM `tasks` WHERE `id` = ' . $_GET['id'];
    // SQLを実行
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    // データを取得する
    while (1) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
          break;
        }

        global$title;
        $title = $rec['title'];
        global$contents;
        $contents = $rec['contents'];
        global$id;
        $id =  $_GET['id'];
      }
    }

    // $dbh = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編集 | Todoアプリ</title>
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
                <form action="update.php" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value=<?php echo $title; ?>>
                    </div>
                    <div class="form-group">
                        <label for="contents">Contents</label>
                        <textarea class="form-control" name="contents" id="contents" cols="30" rows="10"><?php echo $contents; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value=<?php echo $id; ?>>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>