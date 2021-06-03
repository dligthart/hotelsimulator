<?php
class ArrivalFactory {

    protected $arrivals = array();

   /**
    * Return an array with guests by reference.
    *
    * @param Clock $clock
    * @return array
    */
    public function &make(Clock $clock): array {
        $randomNumberOfArrivals = rand(0,2);
        for($i=1; $i <= $randomNumberOfArrivals; $i++) {
           $guest = new Guest(count($this->arrivals) + 1, $clock->getTime(), $clock->getDay());
           $this->arrivals[] = $guest;
        }
        return $this->arrivals;
    }
}