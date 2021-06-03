<?php 

class Guest {

    private $id;
    private $timeArrived;
    private $dayArrived;
    private $hotelRoom;
    private $daysToStay;
    private $paid = false;
    private $left = false;
    private $clock;

    public function __construct($id, $time, $day) {
        $this->id = $id;
        $this->time = $time;
        $this->day = $day;
        $this->hotelRoom = null;
        $this->daysToStay = rand(1,3);
    }

    public function getId() {
        return $this->id;
    }

    public function makePayment($price) {
        $this->paid = true;
        return $this->paid;
    }

    public function hasPaid() {
        return $this->paid;
    }

    public function getDaysToStay() {
        return $this->daysToStay;
    }

    private function setRoom($hotelRoom) {
        $this->hotelRoom = $hotelRoom;
    }

    public function setClock(Clock $clock) {
        $this->clock = $clock;
    }

    public function run() {
        if(!$this->hasLeft()) {
            $deltaDays = $this->clock->getDay() - $this->dayArrived;
            if($deltaDays == $this->getDaysToStay()) {
                $this->leaveHotel();
            } 
        }       
    }

    public function print() {
        Console::log('Guest['. $this->id . '] says:', 'blue');
    }

    private function leaveHotel() {
        $this->left = true;

        $this->print(); 
        Console::log('I am leaving the hotel');
    }
    
    public function hasLeft() {
        return $this->left;
    }

    public function sayDaysToStay() {
        $this->print();

        Console::log('I want to stay for ', 'normal', false);
        Console::log('[' . $this->getDaysToStay() . ']', 'red', false);
        Console::log(' days');
    }
}