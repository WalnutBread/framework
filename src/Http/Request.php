<?php

namespace WalnutBread\Http;

class Request
{
    public static function getMethod() {
        return filter_input(INPUT_POST, '_method') ? : $_SERVER['REQEUST_METHOD'];
    }

    public static function getPath() {
        return $_SERVER['PATH_INFO'] ?? '/';
    }
}