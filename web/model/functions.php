<?php

    function getBasketSize() {
        if(!isset($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }
        return sizeof($_SESSION["Basket"]);
    }

    function addToBasket($basketItem) {
        if(!isset($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }

        $_SESSION["Basket"][] = $basketItem;        
    }

    function setBasketItems($basketItems) {
        $_SESSION["Basket"] = $basketItems;
    }

    function getBasketItems() {
        if(!isset($_SESSION["Basket"])){
            $_SESSION["Basket"] = array();
        }

        return $_SESSION["Basket"];
    }

    function clearBasket() {
        $_SESSION["Basket"] = array();
    }

    function getPostFieldValue($fieldName, $required, $defaultValue = "") {
        if(isset($_POST[$fieldName]))
        {
            return htmlentities($_POST[$fieldName]);
        }
        if($required) {
            throw new AppException("Field $fieldName required.");
        }
        return $defaultValue;
    }

    function getRequestFieldValue($fieldName, $required, $defaultValue = "") {
        if(isset($_REQUEST[$fieldName]))
        {
            return htmlentities($_REQUEST[$fieldName]);
        }
        if($required) {
            throw new AppException("Field $fieldName required.");
        }
        return $defaultValue;
    }

    function getDateInMySQLFormat($date) {
        // https://stackoverflow.com/questions/6267614/convert-uk-date-to-mysql-date
        return DateTime::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    function getDateInUKFormat($date) {
        // https://stackoverflow.com/questions/6267614/convert-uk-date-to-mysql-date
        return DateTime::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }    
    
    function isPostBackWithField($fieldName) {
            return $_SERVER["REQUEST_METHOD"] == "POST" && 
                isset($_POST[$fieldName]);
    }

    function json_response($data = null, $code = 200, $useCache = false, $message = "")
    {
        // clear the old headers
        header_remove();
        // set the actual code
        http_response_code($code);
        // set the header to make sure cache is forced
        if($useCache) {
            header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        }
        
        // treat this as json
        header('Content-Type: application/json');
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
            );
        // ok, validation error, or failure
        header('Status: '.$status[$code]);
        // return the encoded json
        return json_encode(array(
            'status' => $code < 300, // success or not?
            'message' => $message,
            'data' => $data
            ));
    }    
?>