<?php

use Base\Db;

require '../vendor/autoload.php';
require '../base/config.php';

$db = Db::getInstance();
$res = $db->exec(
    'INSERT INTO users (name, password) VALUES (:name, :password)',
    __FILE__,
    [
        ':name' => 'Petja',
        ':password' => 'sdfjasdlkfua'
    ]
);

var_dump($res);
echo $db->getLogHTML();