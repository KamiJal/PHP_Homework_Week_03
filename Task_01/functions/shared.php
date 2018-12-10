<?php

function generatePasswordHash(string $password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

function isStringNullOrWhitespaces(string $string)
{
    return !isset($string) || preg_match('/\s/', $string);
}

function redirect(string $url)
{
    if (isStringNullOrWhitespaces($url))
        return;

    header("Location:$url");
    die();
}

function response(bool $status, string $message)
{
    return ['status' => ($status ? 'success' : 'error'), 'message' => $message];
}