<?php

    require_once("../imports.php");

    restrictPageToAdministrators();
    
    $numberOfCustomers = BookingDatabase::getInstance()->getNumberOfCustomers();
    $numberOfPromotions = BookingDatabase::getInstance()->getNumberOfPromotions();
    $numberOfVehicles = BookingDatabase::getInstance()->getNumberOfVehicles();

    require_once("includes/admin_header.php");

    require_once("view/index_view.php");

    require_once("includes/admin_footer.php");

?>