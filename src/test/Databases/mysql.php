<?php
include_once __DIR__."/../../../vendor/autoload.php";

/* MySQL */

use WalnutBread\Databases\MySQL;

$mysql = new MySQL();
$mysql->setup("127.0.0.1", "root", "12341234", "test", "3307");

$mysql->prepare("SELECT * FROM test");
$mysql->execute();
$result = $mysql->getResult();
foreach ($result as $key => $value) {
    echo $key." : ".$value['seq']."\n";
}

echo "\n";

$mysql->prepare("SELECT * FROM test WHERE seq = ?");
$mysql->bind("i", [1]);
$mysql->execute();
$result = $mysql->getResult();
foreach ($result as $key => $value) {
    echo $key." : ".$value['seq']."\n";
}