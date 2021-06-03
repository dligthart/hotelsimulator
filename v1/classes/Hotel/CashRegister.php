<?php
class CashRegister 
{

    private $ledger = array();

    public function __construct() {
        //
    }

    public function add($amount) {
        $this->ledger[] = $amount;
    }

    public function print() {
        Console::log('Cash register: ', 'green');
        Console::log('Total amount in register: ');
        Console::log( '[' . array_sum($this->ledger) . ']', 'normal', false, 'magenta');
    }
}