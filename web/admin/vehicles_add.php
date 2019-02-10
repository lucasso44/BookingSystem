<?php

    require_once("../imports.php");
    
    restrictPageToAdministrators();

    if (isPostBackWithField("addVehicleAttempt")) {

        $vehicle = new Vehicle();
        $vehicle->vehicleModelId = getPostFieldValue("vehicleModelId", true);
        $vehicle->registrationNo = getPostFieldValue("registrationNo", true);
        $vehicle->registrationDate = getDateInMySQLFormat(getPostFieldValue("registrationDate", true));

        BookingDatabase::getInstance()->addVehicle($vehicle);
        header("Location: vehicles.php");
        die();
    }
    
    $vehicleModels = BookingDatabase::getInstance()->getAllVehicleModels();

    require_once("includes/admin_header.php");
    
    require_once("view/vehicles_add_view.php");

    require_once("includes/admin_footer.php");

?>