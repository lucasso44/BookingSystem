<?php

    require_once("../imports.php");

    restrictPageToAdministrators();

    $onVehicleDeletedMessage = "";
    if (isPostBackWithField("deleteVehicleAttempt")) {

        $deleteVehicleId = getPostFieldValue("deleteVehicleId", true);
        BookingDatabase::getInstance()->deleteVehicle($deleteVehicleId);
        $onVehicleDeletedMessage = "Vehicle successfully deleted";
    }
    
    $vehicles = BookingDatabase::getInstance()->getAllVehicles();// call a single instance of the booking database class
    require_once("includes/admin_header.php");
       
    require_once("view/vehicles_view.php");

    require_once("includes/admin_footer.php");

?>