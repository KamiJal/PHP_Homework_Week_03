<?php
function addImageInfoToDb(array $image)
{
    $sql = 'INSERT INTO Pictures (name, size, imagepath) VALUES(?, ?, ?);';
    $sth = getDbContext()->prepare($sql);
    return $sth->execute([$image['name'], $image['size'], $image['imagepath']]);
}

function getDbContext()
{
    if (!isset($GLOBALS['DbContext'])) {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s;', DB_HOST, DB_NAME, DB_CHARSET);
        $GLOBALS['DbContext'] = new PDO($dsn, DB_USER, DB_PASS, OPT);
    }
    return $GLOBALS['DbContext'];
}

function getImageCount()
{
    return getDbContext()->query('SELECT COUNT(id) FROM Pictures')->fetch();
}
