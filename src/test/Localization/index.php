<?php
include_once __DIR__."/../../../vendor/autoload.php";
use WalnutBread\Localization\Localize;

$localize = new Localize();
$localize->setPath(__DIR__."/../../Localization");
$file = $localize->getReadFile("ko");
$json = json_decode($file);

var_dump($json);