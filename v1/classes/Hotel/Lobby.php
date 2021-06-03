<?php 

class Lobby 
{
    private $receptionist;

    public function __construct($receptionist) {
        $this->receptionist = $receptionist;
    }

    public function run(Guest $guest, CashRegister $register) {
        $this->receptionist->run($guest, $register);
    }
}