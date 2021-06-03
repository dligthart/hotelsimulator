<?php
/**
 * Hotel Simulator Example to teach PHP Basics.
 * 
 * @author dligthart
 * @version 0.1
 */

require_once 'classes/Hotel/Clock.php';
require_once 'classes/ArrivalFactory.php';
require_once 'classes/Role/Guest.php';
require_once 'classes/Role/Receptionist.php';
require_once 'classes/Hotel/Lobby.php';
require_once 'classes/Hotel/Hotel.php';
require_once 'classes/Hotel/CashRegister.php';
require_once 'classes/Console.php';

define("RUN_DAYS", 1);

$hotel = new Hotel( 
    new CashRegister(), 
    new Lobby( new Receptionist() ) );

$arrivalFactory = new ArrivalFactory;

$clock = new Clock();

while($clock->getDay() <= RUN_DAYS) {
    $clock->tick();

    $clock->print();
    
    $guests = $arrivalFactory->make($clock);

    foreach($guests as $key => $guest) {
        $guest->setClock($clock);
        $hotel->run($guest, $guests);
    }

    $hotel->print();
}