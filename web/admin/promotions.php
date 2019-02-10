<?php

    require_once("../imports.php");

    restrictPageToAdministrators();
    
    $onPromotionDeletedMessage = "";

    if (isPostBackWithField("deletePromotionAttempt")) {

        $deletePromotionId = getPostFieldValue("deletePromotionId", true);

        BookingDatabase::getInstance()->deletePromotion($deletePromotionId);
        $onPromotionDeletedMessage = "Promotion successfully deleted";
    }


    $promotions = BookingDatabase::getInstance()->getAllPromotions();



    require_once("includes/admin_header.php");
    
  
    require_once("view/promotions_view.php");

    require_once("includes/admin_footer.php");

?>