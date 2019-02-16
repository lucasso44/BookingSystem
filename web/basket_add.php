<?php

    require_once("imports.php");

    $url = getRequestFieldValue("url", false);
    $isDirect = intval(getRequestFieldValue("direct", false, 0)) == 1;

    $processingMessage = "";

    if (isPostBackWithField("addBookingItemAttempt")) {

        try
        {
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
    
            if($basketItem->passengerNo > $vehicleModel->maxNoOfPassengers) {
                throw new AppException("No of Passengers exceeded maximum number of passengers permitted for this vehicle.");
            }

            $licenceCategoryId = intval(getPostFieldValue("licenceCategoryId", true));
            if($licenceCategoryId == 0) {
                $basketItem->isSelfDriving = getPostFieldValue("isSelfDriving", false) == "Yes";
            }
            else {
                $basketItem->isSelfDriving = $licenceCategoryId != 0;
            }
            
            $basketItem->preferredDriver = getPostFieldValue("preferredDriver", false);
    
            addToBasket($basketItem);
                    
            if($url == "") {
                header("Location: browse.php?revisit=1&addedToBasket=1");
            }
            else {
                header("Location: $url?addedToBasket=1");
            }
            die();   
        }
        catch(AppException $ae) {
            $processingMessage = $ae->getMessage();
        }
    }

    $vehiceModelId = intval(getRequestFieldValue("vehicleModelId", false, "0"));

    if($vehiceModelId == 0) {
        if($url == "") {
            header("Location: browse.php");
        }
        else {
            header("Location: $url");
        }
        die();
    }

    $vehicleModel = BookingDatabase::getInstance()->getVehicleModel($vehiceModelId);

    $promotionId = intval(getRequestFieldValue("promotionId", false, "0"));

    if($promotionId > 0) {
        $promotion = BookingDatabase::getInstance()->getPromotionById($promotionId);
        $vehicleModel->dailyRate = $promotion->dailyRate;
    }
    else {
        $promotion = null;
    }

    if(!isset($_SESSION["vehicleModelQuery"]) || $isDirect) {
        $vehicleModelQuery = new VehicleModelQuery();

        $dateFrom = new DateTime();
        $dateFrom->add(new DateInterval("P1D"));
    
        $dateTo = new DateTime();
        $dateTo->add(new DateInterval("P2D"));

        $vehicleModelQuery->dateFrom = getDateInMySQLFormat(getRequestFieldValue("dateFrom", false, $dateFrom->format("d/m/Y")));
        $vehicleModelQuery->dateTo = getDateInMySQLFormat(getRequestFieldValue("dateTo", false, $dateTo->format("d/m/Y")));
        $vehicleModelQuery->licenceCategoryId = 0;
    }    
    else {
        $vehicleModelQuery = $_SESSION["vehicleModelQuery"];
    }
    
    require_once("includes/header.php");

    require_once("view/basket_add_view.php");

    require_once("includes/footer.php");

?>