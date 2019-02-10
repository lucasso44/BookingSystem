<?php

class VehicleModel {
    public $id;
    public $model;
    public $minNoOfPassengers;
    public $maxNoOfPassengers;
    public $hourlyRate;
    public $licenseCategoryId;
    public $category;
    public $vehicleStandardId;
    public $standard;
    public $total;

    function __get($name) {
        return $this->$name;
      }
    
      function __set($name,$value) {
        $this->$name = $value;
      }   
 }

?>