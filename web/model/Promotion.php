<?php

class Promotion {
    public $id;
    public $vehicleModelId;
    public $info;
    public $title;
    public $dailyRate;
    public $expiringDate;
    public $model;
    
    function __get($name) {
        return $this->$name;
      }
    
      function __set($name,$value) {
        $this->$name = $value;
      }   
 }

?>