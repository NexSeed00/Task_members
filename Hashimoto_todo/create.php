<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoアプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style type="text/css">
        <!-- .form-group select{
                display: block;
                border: 1px solid #ced4da;
                border-radius: .25rem;
                width: 100%;
                height: calc(1.5em + .75rem + 2px);
                padding: .375rem .75rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
            } -->
    </style>
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
                <form action="store.php" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="タイトル">
                    </div>
                    
                    <!-- カテゴリーによって画像が変わる -->
<!--                     <div class="form-group">
                        <label for="category">Category</label>
                        <select name="cate" id="">
                            <option value=""></option>
                            <option value="shopping">買い物</option>
                            <option value="study">勉強</option>
                            <option value="exercise">運動</option>
                            <option value="reading">読書</option>
                            <option value="housework">家事</option>
                            <option value="preparation">準備</option>
                            <option value="other">その他</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="contents">Contents</label>
                        <textarea class="form-control" name="contents" id="contents" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">POST</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>