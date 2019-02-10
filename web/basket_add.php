<?php

    require_once("imports.php");

    if (isPostBackWithField("addBookingItemAttempt")) {

        $basketItem = new BasketItem();
        $basketItem->id = getBasketSize() + 1;
        $basketItem->vehicleModelId = intval(getPostFieldValue("vehicleModelId", true));

        $vehicleModel = BookingDatabase::getInstance()->getVehicleModel($basketItem->vehicleModelId);
        $basketItem->model = $vehicleModel->model;
        $basketItem->standard = $vehicleModel->standard;
        $basketItem->category = $vehicleModel->category;
        $basketItem->dailyRate = $vehicleModel->dailyRate;

        $basketItem->placeFrom = getPostFieldValue("placeFrom", false);
        $basketItem->placeTo = getPostFieldValue("placeTo", false);
        $basketItem->dateTo = getDateInMySQLFormat(getPostFieldValue("dateTo", true));
        $basketItem->dateFrom = getDateInMySQLFormat(getPostFieldValue("dateFrom", true));
        $basketItem->passengerNo = intval(getPostFieldValue("passengerNo", true));
        $basketItem->isSelfDriving = getPostFieldValue("isSelfDriving", true) == "1";
        $basketItem->preferredDriver = getPostFieldValue("preferredDriver", false);

        addToBasket($basketItem);

        // var_dump($basketItem);
        // die();
                
        header("Location: browse.php?revisit=1");
        die();
    }

    if(!isset($_SESSION["vehicleModelQuery"])) {
        header("Location: browse.php");
        die();
    }

    $vehiceModelId = intval(getRequestFieldValue("vehicleModelId", false, "0"));

    if($vehiceModelId == 0) {
        header("Location: browse.php");
        die();        
    }

    $vehicleModel = BookingDatabase::getInstance()->getVehicleModel($vehiceModelId);
    
    $vehicleModelQuery = $_SESSION["vehicleModelQuery"];

    require_once("includes/header.php");

    require_once("view/basket_add_view.php");

    require_once("includes/footer.php");

?>