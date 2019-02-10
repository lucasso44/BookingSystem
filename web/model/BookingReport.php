<?php

class BookingReport {
    public $month;
    public $noOfBookings;

    function &__get($name) {
        return $this->$name;
      }
    
      function __set($name,$value) {
        $this->$name = $value;
      }   
 }

?>