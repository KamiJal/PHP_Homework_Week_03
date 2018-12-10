<?php
require_once '../config.php';
require_once FUNCTIONS_PATH . 'upload.php';
require_once FUNCTIONS_PATH . 'shared.php';

$response = null;

//ERROR HANDLING IF FILE EXCEEDS POST_MAX_SIZE
//OUTPUT BUFFER DATA IS CREATED IN functions/upload.php
if (ob_get_contents() === '') {
    $response = response(false, 'The uploaded file exceeded 2 Mb.');
}

if (isset($_FILES['inputFile']))
    $response = upload($_FILES['inputFile']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Week 03 Homework Task 02</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
</head>
<body class="text-center">

<form class="form-signin" enctype="multipart/form-data" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Upload image file</h1>

    <div class="form-group">
        <label for="inputFile" class="text-muted">Allowed only images. Max file size is 2Mb</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="2048576"/>
        <input type="file" id="inputFile" name="inputFile" class="form-control-file" required autofocus>
    </div>

    <?php if (isset($response)) : ?>
        <div class="alert alert-<?= $response['status'] === 'error' ? 'danger' : 'success' ?>" role="alert">
            <?= $response['message'] ?>
        </div>
    <?php endif; ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">UPLOAD</button>

    <br><br>
    <a href="../index.php">Back</a>
    <p class="mt-5 mb-3 text-muted">&copy; Kamil Ushurbakiyev 2018</p>
</form>

</body>
</html>