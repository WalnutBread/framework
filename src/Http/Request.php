<?php

namespace WalnutBread\Http;

class Request
{
    public static function getMethod() {
        return filter_input(INPUT_POST, '_method') ? : $_SERVER['REQUEST_METHOD'];
    }

    public static function getPath() {
        if(array_key_exists("PATH_INFO", $_SERVER)) {
            return $_SERVER['PATH_INFO'] ?? '/';
        } else {
            return explode("?", $_SERVER['REQUEST_URI'])[0];
        }
    }
}