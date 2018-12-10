<?php

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
const FUNCTIONS_PATH = BASE_PATH . 'functions' . DIRECTORY_SEPARATOR;

const DB_HOST = '127.0.0.1';
const DB_NAME = 'kamijaldb';
const DB_USER = 'root';
const DB_PASS = '';

//FIRST DB CONTEXT INITIALIZATION
require_once FUNCTIONS_PATH . 'dbManager.php';
connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
