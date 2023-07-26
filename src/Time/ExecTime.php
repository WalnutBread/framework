<?php

namespace WalnutBread\Time;

class ExecTime
{
    public array $spendData = [];

    public $start;

    public $end;

    public $diff;

    public $total_start;

    public $total_end;

    public $total_diff;

    public function __construct(array $data) {
        $this->spendData = $data;
    }

    public function start(): void
    {
        $this->start = microtime(true);
    }

    public function end(): void
    {
        $this->end = microtime(true);
    }

    public function diff(string $key): float
    {
        $this->spendData[$key] = $this->end - $this->start;
        return $this->spendData[$key];
    }

    public function total_start() : void {
        $this->total_start = microtime(true);
    }

    public function total_end() : void {
        $this->total_end = microtime(true);
    }

    public function total_diff(string $key): float {
        $this->spendData[$key] = $this->total_end - $this->total_start;
        return $this->spendData[$key];
    }

    public function print() {
        foreach ($this->spendData as $key => $value) {
            echo $key." : ".number_format($value, 8)." (sec)<br>";
        }
    }

}