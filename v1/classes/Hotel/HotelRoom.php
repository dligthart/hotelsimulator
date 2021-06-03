<?php

class HotelRoom 
{

    private $occupant = null;
    private $roomNumber = 0;
    private $available = true;
    private $clean = true;

    public function __construct($roomNumber) {
        $this->roomNumber = $roomNumber;
    }

    public function addOccupant($occupant) {
        $this->occupant = $occupant;
    }

    public function getOccupant() {
        return $this->occupant;
    }

    public function isOccupied(): bool {
        return ($this->occupant != null);
    }

    public function isAvailable(): bool {
        
    }

    public function isClean(): bool {

    }
}