<?php
require_once 'config.php';
require_once FUNCTIONS_PATH . 'registration.php';

$response = null;
if (userViewModelStateIsValid($_POST)) {
    $response = registerNewUser($_POST);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP Week 03 Homework Task 01</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

<form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Registration</h1>

    <div class="form-group">
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" id="inputLogin" name="login" class="form-control" placeholder="Login"
               value="<?= isset($GLOBALS['login']) ? $GLOBALS['login'] : '' ?>" required autofocus>
    </div>

    <div class="form-group">
        <label for="inputFirstName" class="sr-only">First name</label>
        <input type="text" id="inputFirstName" name="firstName" class="form-control" placeholder="First name"
               value="<?= isset($GLOBALS['firstName']) ? $GLOBALS['firstName'] : '' ?>"
               required autofocus>
    </div>

    <div class="form-group">
        <label for="inputLastName" class="sr-only">Last name</label>
        <input type="text" id="inputLastName" name="lastName" class="form-control" placeholder="Last name"
               value="<?= isset($GLOBALS['lastName']) ? $GLOBALS['lastName'] : '' ?>" required
               autofocus>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address"
               value="<?= isset($GLOBALS['email']) ? $GLOBALS['email'] : '' ?>" required
               autofocus>
    </div>

    <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password"
               required>
    </div>

    <div class="form-group">
        <label for="inputConfirmPassword" class="sr-only">Confirm password</label>
        <input type="password" id="inputConfirmPassword" name="confirmPassword" class="form-control"
               placeholder="Confirm password" required>
    </div>

    <?php if (isset($response)) : ?>
        <div class="alert alert-<?= $response['status'] === 'error' ? 'danger' : 'success' ?>" role="alert">
            <?= $response['message'] ?>
        </div>
    <?php endif; ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>


    <p class="mt-5 mb-3 text-muted">&copy; Kamil Ushurbakiyev 2018</p>
</form>
</body>
</html>
