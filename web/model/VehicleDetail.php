<?php

class VehicleDetail extends Vehicle {
    public $id;
    public $model;
    public $minNoOfPassengers;
    public $maxNoOfPassengers;
    public $dailyRate;

    function &__get($name) {
        return $this->$name;
      }
    
      function __set($name,$value) {
        $this->$name = $value;
      }   
 }

?>