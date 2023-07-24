<?php

namespace WalnutBread\Application;

class Application
{
    const VERSION = "1.0.0";

    public function run(): string {
        return self::class;
    }
}