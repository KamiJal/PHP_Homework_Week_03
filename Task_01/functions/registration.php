<?php

require_once 'shared.php';
require_once 'dbManager.php';

function registerNewUser(array $user)
{
    //IN CASE IF USER ENTERS WHITESPACES
    foreach ($user as $field) {
        if (isStringNullOrWhitespaces($field))
            return response(false, 'Field cannot be empty.');
    }

    //WHEN ERROR OCCURS TO AUTOFILL THE FIELDS
    userViewModelGlobalsInitialize($user);

    //IS LOGIN UNIQUE
    if (isLoginAlreadyRegistered($user['login']))
        return response(false, 'This login is already taken.');

    //IS PASSWORD LONG ENOUGH
    if (!(strlen($user['password']) > 5))
        return response(false, 'Password too short - minimum length is 6 characters.');

    //PASSWORD MATCH CONFIRM PASSWORD
    if ($user['password'] !== $user['confirmPassword'])
        return response(false, 'Password does not match the confirm password.');

    if (!addUserToDb($user))
        return response(false, 'Internal server error. Please try later.');

    //CLEANS AUTOFILL FIELDS
    userViewModelGlobalsErase();

    redirect('registrationSuccess.php');
}

function userViewModelGlobalsErase(){
    $GLOBALS['login'] = null;
    $GLOBALS['firstName'] = null;
    $GLOBALS['lastName'] = null;
    $GLOBALS['email'] = null;
}

function userViewModelGlobalsInitialize(array $user){
    $GLOBALS['login'] = $user['login'];
    $GLOBALS['firstName'] = $user['firstName'];
    $GLOBALS['lastName'] = $user['lastName'];
    $GLOBALS['email'] = $user['email'];
}

function userViewModelStateIsValid(array $user)
{
    return isset($user['login']) && isset($user['firstName'])
        && isset($user['lastName']) && isset($user['email'])
        && isset($user['password']) && isset($user['confirmPassword']);
}



