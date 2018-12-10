<?php

const DB_CHARSET = 'utf8';
const OPT = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

function addUserToDb(array $user)
{
    $sql = 'INSERT INTO users (login, password, first_name, last_name, email) VALUES(?, ?, ?, ?, ?);';
    $sth = $GLOBALS['DbContext']->prepare($sql);
    $passwordHash = generatePasswordHash($user['password']);
    return $sth->execute([$user['login'], $passwordHash, $user['firstName'], $user['lastName'], $user['email']]);
}

function connect(string $host, string $user, string $pass, string $dbname)
{
    if (!isset($GLOBALS['DbContext'])) {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s;', $host, $dbname, DB_CHARSET);
        $GLOBALS['DbContext'] = new PDO($dsn, $user, $pass, OPT);
    }

    return $GLOBALS['DbContext'];
}

function getAllUsers()
{
    return $GLOBALS['DbContext']->query('SELECT * FROM users')->fetchAll();
}

function isLoginAlreadyRegistered(string $login)
{
    $sql = 'SELECT login FROM users WHERE login = ?;';
    $sth = $GLOBALS['DbContext']->prepare($sql);
    $sth->execute([$login]);
    $user = $sth->fetch();
    return $login === $user['login'];
}