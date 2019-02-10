<?php
    require_once("imports.php");

    $basketItems = getBasketItems();

    $checkOutMessage = "";

    if(getBasketSize() > 0) {
        try {
            BookingDatabase::getInstance()->checkout($authUser, $basketItems);
        }
        catch(AppException $ae) {
            $checkOutMessage = $ae->getMessage();
        }
        
    }

    require_once("includes/header.php");

    require_once("view/checkout_view.php");

    require_once("includes/footer.php");

    clearBasket();
?>