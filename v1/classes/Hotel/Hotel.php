<?php 

class Hotel 
{
    private $cashRegister = null;
    private $rooms = array();
    private $lobby = null;
    private $guests = array();

    public function __construct(CashRegister $cashRegister, Lobby $lobby) {
        $this->cashRegister = $cashRegister;
        $this->lobby = $lobby;
    }

    public function run($guest, &$guests) {

        $this->setGuests($guests);

        if($guest->hasPaid()) {
            $guest->run();
        } 

        $this->lobby->run($guest, $this->cashRegister);

        foreach($guests as $key => $value) {
            if($value->getId() == $guest->getId() && $guest->hasLeft()) {
                unset($guests[$key]);
            }
        }
    }

    public function getCashRegister() {
        return $this->cashRegister;
    }

    public function setGuests($guests) {
        $this->guests = $guests;
    }

    public function print() {
       
       echo 'The number of guests in the hotel to date: ' . count($this->guests) . PHP_EOL;

       Console::log('The following guests are still in the hotel: ');

       foreach($this->guests as $guest) {
           Console::log('Guest ' . $guest->getId(), 'cyan');
       }

       $this->cashRegister->print();
    }
}