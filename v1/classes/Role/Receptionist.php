<?php 

class Receptionist {

    const PRICE_PER_DAY = 100;

    public function run(Guest $guest, CashRegister $register) {

        if(!$guest->hasPaid()) {

            $this->greet($guest);

            $stay = $guest->getDaysToStay();
        
            $guest->sayDaysToStay();
    
            $price = $this->calculatePayment($stay);
    
            $this->sayPrice($price);
            
            $guest->print();
    
            echo 'I am paying $$$' . $price . PHP_EOL;
    
            if($guest->makePayment($price)) {

                $register->add($price);
            }
        } 
    }

    private function greet($guest) {
        $this->print();
        
        Console::log('Hello and welcome to the hotel');
        Console::log('Your guest number is: ' . $guest->getId());
    }

    private function findRoom() {

    }

    private function calculatePayment($days) {
        return $days * self::PRICE_PER_DAY;
    }

    public function print() {
        Console::log('Receptionist says:', 'red');
    }

    public function sayPrice($price) {
        $this->print();
        echo 'Please pay ' . $price . PHP_EOL;
    }

}