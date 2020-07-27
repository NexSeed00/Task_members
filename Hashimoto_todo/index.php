<?php
    require_once('dbconnect.php');
    require_once('function.php');

    // 検索欄に何か入っていたら
    if (isset($_GET['search'])) {
        $search = h($_GET['search']);
        $search_value = $search;
        $stmt = $dbh->prepare('select * from tasks where title LIKE "%'.$search.'%"');
        $stmt->execute();
        $tasks = $stmt->fetchAll();

        if($search == ""){
            $stmt = $dbh->prepare('select * from tasks');
            $stmt->execute();
            $tasks = $stmt->fetchAll();
        }

    }else {
        $search = '';
        $search_value = '';
        $stmt = $dbh->prepare('select * from tasks ORDER BY id DESC');
        $stmt->execute();
        $tasks = $stmt->fetchAll();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        <!--
        .row.p-3{
            display: block;
        } 
        .col-sm-6{
            display: flex;
            flex-wrap: wrap;
            max-width: none;
            width: 100%;
        }
        .card{
            width: 200px;
            height: auto;
            margin: 0 10px 10px 0;
            }
        -->
    </style>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        });
    </script>
</head>

<body>
    <div class="container-fulid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-dark bg-dark">
                    <a href="index.php" class="navbar-brand">Todo</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="create.php">Create</a>
                        </li>
                        <li class="nav-item">
                            <form action="" method="get" class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>

        <div class="row p-3">
            <div id="sortable" class="col-sm-6 col-md-4 col-lg-3 py-3 py-3">
                <!-- 取得した配列をそれぞれ繰り返す -->
                <!-- foreach (配列変数 as キー変数 => 値変数){ -->
                <?php foreach ($tasks as $index=>$task) :?>
                <!-- function内の関数呼び出す -->
                <div class="card">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $task['title'];?></h5>
                        <p class="card-text">
                            <?php echo $task['contents'];?>
                        </p>
                        <div class="text-right d-flex justify-content-end">
                            <form method="POST" name="form1" action="edit.php">
                            <!-- インデックス番号を取得 -->
                            <a href="javascript:form1[<?php echo ($index); ?>].submit()" class="btn text-success">EDIT</a>
                            <input type="hidden" name="id" value="<?php echo ($task['id']); ?>">
                            </form>

                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo($task['id'])?>">
                                <button type="submit" class="btn text-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</body>

</html>