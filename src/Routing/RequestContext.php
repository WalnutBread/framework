<?php

namespace WalnutBread\Routing;

class RequestContext
{
    public $method;

    public $path;

    public $handler;

    public $middleware;

    public function __construct($method, $path, $handler, $middleware) {
        $this->method = $method;
        $this->path = $path;
        $this->handler = $handler;
        $this->middleware = $middleware;
    }

    public function match($url) {
        $urlParts = explode("/", $url);
        $urlPatternParts = explode("/", $this->path);
        if(count($urlParts) === count($urlPatternParts)) {
            $urlParams = [];

            foreach($urlPatternParts as $key => $part) {
                if(preg_match('/^\{.*\}$/', $part)) {
                    $urlPatternParts[$key] = $part;
                } else {
                    if ($urlParts[$key] !== $part) {
                        return null;
                    }
                }
            }

            return count($urlParams) < 1
                    ? []
                    : array_map( fn ($k) => $urlParts[$k], array_keys($urlParams));
        }
        return [];
    }

    public function runMiddlewares(): bool {
        foreach($this->middleware as $middlewares) {
            if(!$middlewares::process()) {
                return false;
            }
        }
        return true;
    }
}