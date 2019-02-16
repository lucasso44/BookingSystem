<?php

    require_once("../imports.php");

    restrictPageToAdministrators();

    if (isPostBackWithField("editPromotionAttempt")) {
      
        $editPromotionId = getPostFieldValue("editPromotionId", true);

        $editPromotion = BookingDatabase::getInstance()->getPromotionById($editPromotionId);

        $promotion = new Promotion();
        $promotion->id = $editPromotion->id;
        $promotion->title = getPostFieldValue("title", true);
        $promotion->info = getPostFieldValue("info", true);
        $promotion->vehicleModelId = intval(getPostFieldValue("vehicleModelId", true));
        $promotion->dailyRate = intval(getPostFieldValue("dailyRate", true));
        $promotion->expiringDate = getDateInMySQLFormat(getPostFieldValue("expiringDate", true));
        
        BookingDatabase::getInstance()->updatePromotion($promotion);    

        header("Location: promotions.php");
        die();                            
    } 
    
    if(!isset($_GET["id"])) {
        header("Location: promotions.php");
        die(); 
    }

    $requestedPromotionId = intval($_GET["id"]);

    $editPromotion = BookingDatabase::getInstance()->getPromotionById($requestedPromotionId);
    
    if($editPromotion == null) {
        header("Location: promotions.php");
        die();        
    }    

    $vehicleModels = BookingDatabase::getInstance()->getAllVehicleModels();

    require_once("includes/admin_header.php");
    
    require_once("view/promotions_edit_view.php");

    require_once("includes/admin_footer.php");

?>