<?php

namespace WalnutBread;

class Application
{
    const VERSION = "1.0.0";

    private mixed $providers = [];

    public function __construct($providers = [])
    {
        $this->providers = $providers;
        array_walk($this->providers, fn ($provider) => $provider::register());
    }

    public function boot() {
        array_walk($this->providers, fn ($provider) => $provider::boot());
    }
}