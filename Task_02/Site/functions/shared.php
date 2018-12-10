<?php

function isImage(string $filePath)
{
    //EXPLICIT IGNORING OF WARNINGS
    return @is_array(getimagesize($filePath)) ? true : false;
}

function response(bool $status, string $message)
{
    return ['status' => ($status ? 'success' : 'error'), 'message' => $message];
}