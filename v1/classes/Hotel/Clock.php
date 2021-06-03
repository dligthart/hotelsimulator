<?php 
class Clock 
{

    private $time = 0;
    private $day = 0;

    public function __construct() {
        $this->time = 0;
        $this->day = 0;
    }

    public function tick() {
        $this->time++;
        if($this->time == 24) {
            $this->time = 0;
            $this->day++;
        } 
    }

    public function getDay() {
        return $this->day;
    }

    public function getTime() {
        return $this->time;
    }

    public function print() {
        echo PHP_EOL;
        echo 'The current day is ' . $this->day . PHP_EOL;
        echo 'The time is '. $this->time . PHP_EOL; 
        echo '------------------------------------------' . PHP_EOL;
    }
}