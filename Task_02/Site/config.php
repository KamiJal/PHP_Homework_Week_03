<?php

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
const FUNCTIONS_PATH = BASE_PATH . 'functions' . DIRECTORY_SEPARATOR;
const IMAGES_PATH = BASE_PATH . 'images' . DIRECTORY_SEPARATOR;

const DB_HOST = '127.0.0.1';
const DB_NAME = 'kamijaldb';
const DB_USER = 'root';
const DB_PASS = '';

const DB_CHARSET = 'utf8';
const OPT = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
