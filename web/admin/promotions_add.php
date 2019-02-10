<?php

    require_once("../imports.php");
    
    restrictPageToAdministrators();
    
    $addPromotionErrorMessage = "";


    if (isPostBackWithField("addPromotionAttempt")) {

        $promotion = new Promotion();
        $promotion->vehicleModelId = intval(getPostFieldValue("vehicleModelId", true));
        $promotion->title = getPostFieldValue("title", true);
        $promotion->info = getPostFieldValue("info", true);
        $promotion->dailyRate = intval(getPostFieldValue("dailyRate", true));
        $promotion->expiringDate = getDateInMySQLFormat(getPostFieldValue("expiringDate", true));

        BookingDatabase::getInstance()->addPromotion($promotion);
        header("Location: promotions.php");
        die();
    }

    $vehicleModels = BookingDatabase::getInstance()->getAllVehicleModels();



    require_once("includes/admin_header.php");
    
    require_once("view/promotions_add_view.php");

    require_once("includes/admin_footer.php");

?>