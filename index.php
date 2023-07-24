<?php
require_once './vendor/autoload.php';

use WalnutBread\Routing\Route;
use WalnutBread\Databases\DatabaseAdaptor;

Route::add("get", "/", function () {
    echo 'Hello World';
});