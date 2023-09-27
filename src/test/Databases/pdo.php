<?php

use WalnutBread\Databases\PDO;

include_once __DIR__."/../../../vendor/autoload.php";


/* PDO */

$pdo = new PDO();
$pdo->setup("mysql:dbname=test;host=127.0.0.1;port=3307;", "root", "12341234", null, null);
$all = $pdo->getAll("SELECT * FROM test WHERE seq = ?", [1]);

foreach ($all as $key => $value) {
    echo $key." : ".$value->seq."\n";
}

var_dump($all);