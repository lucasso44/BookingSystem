<?php

class Promotion {
    private $id;
    private $vehicleModelId;
    private $info;
    private $title;
    private $dailyRate;
    private $expiringDate;
    private $model;

    function __get($name) {
        return $this->$name;
      }
    
      function __set($name,$value) {
        $this->$name = $value;
      }   
 }

?>