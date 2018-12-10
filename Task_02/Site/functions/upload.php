<?php
require_once FUNCTIONS_PATH . 'shared.php';
require_once FUNCTIONS_PATH . 'dbManager.php';

const INTERNAL_SERVER_ERROR = 'Failed to upload file. Internal server error. Please try later.';

//IGNORES WARNING 'Warning: POST Content-Length' IN LINE 0
//IF FILE SIZE EXCEEDS PHP POST_MAX_SIZE IN .htaccess
if(!empty(ob_get_clean())) {
    ob_start();
    echo '';
}

function fileErrorCheck(int $error)
{
    switch ($error) {
        case 1:
        case 2:
            return response(false, 'The uploaded file exceeded 2 Mb.');
        case 3:
            return response(false, 'The uploaded file was only partially uploaded.');
        case 4:
            return response(false, 'No file was uploaded.');
        case 5:
            return response(false, 'The uploaded file was only partially uploaded.');
        default:
            return response(false, INTERNAL_SERVER_ERROR);
    }
}

function generateImageArrayForDb(array $file)
{
    //GET FILE NAME WITHOUT TYPE NAME
    $name = substr($file['name'], 0, strpos($file['name'], '.', -0));
    return ['name' => $name, 'size' => $file['size'], 'imagepath' => IMAGES_PATH . $file['name']];
}

function upload(array $file)
{
    //FILE ERROR CODE CHECKING
    if ($file['error'] > 0)
        return fileErrorCheck($file['error']);

    //CHECK IS FILE AN IMAGE
    if (!isImage($file['tmp_name']))
        return response(false, 'Only images are allowed to upload.');

    //CHECK IF MOVING FILE FAILED
    if (!@move_uploaded_file($file['tmp_name'], IMAGES_PATH . $file['name']))
        return response(false, INTERNAL_SERVER_ERROR);

    //CHECK IF IMAGE INFO DB SAVE FAILED
    if (!addImageInfoToDb(generateImageArrayForDb($file))) {
        unlink(IMAGES_PATH . $file['name']);
        return response(false, INTERNAL_SERVER_ERROR);
    }

    return response(true, 'The file uploaded with success.');
}