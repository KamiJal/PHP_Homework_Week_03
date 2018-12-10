<?php
require_once 'config.php';
require_once FUNCTIONS_PATH . 'dbManager.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Week 03 Homework Task 02</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Current uploaded pictures count:
            <span class="text-primary"><?= getImageCount()["COUNT(id)"] ?></span></h1>
        <br>
        <a class="btn btn-primary" href="pages/upload.php">UPLOAD IMAGE</a>
        <p class="mt-5 mb-3 text-muted">&copy; Kamil Ushurbakiyev 2018</p>
    </div>

</div>

</body>
</html>