<?php

namespace WalnutBread\Routing;

class Route
{
    private static $contexts = [];

    public static function add($method, $path, $handler, $middlewares = []) {
        self::$contexts = new RequestContext($method, $path, $method, $middlewares);
    }

    public static function run() {
        foreach (self::$contexts as $context) {
            if( $context->method === strtolower(Request::getMethod()) && $context->match(Request::getPath())) {
                if($context->runMiddlewares()) {
                    return call_user_func($context->handler, ...$urlParams);
                }
                return false;
            }
        }
    }
}