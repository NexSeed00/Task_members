<?php
    require_once('dbconnect.php');

    $stmt = $dbh->prepare('SELECT * FROM tasks');
    $stmt->execute();

    // fetch or fetchAll

    $tasks = $stmt->fetchAll();
?>

<style type="text/css">
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
        </div>

        <div class="row p-3">
            <!-- <div class="col-sm-6 col-md-4 col-lg-3 py-3 py-3 cards"> -->
            <div class="cards">
                <?php foreach ($tasks as $task) :?>
                    <div class="card">
                        <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task['title'];?></h5>
                            <p class="card-text">
                                <?php echo $task['contents'];?>
                            </p>
                            <div class="text-right d-flex justify-content-end">
                                <form action="edit.php" method="get" id="<?php echo $task['id'];?>">
                                    <a href="edit.php?id=<?php echo $task['id'];?>" class="btn text-success">EDIT</a>
                                </form>
                                <form action="delete.php" method="get"  id="<?php echo $task['id'];?>">
                                    <a href="delete.php?id=<?php echo $task['id'];?>" class="btn text-danger">DELETE</a>
                                </form>
                                    <!-- <input type="hidden" name="id" id="<?php echo $task['id'];?>">
                                    <button type="submit" class="btn text-danger">DELETE</button> -->
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


</body>

</html>