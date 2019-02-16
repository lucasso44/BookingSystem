<?php

    require_once("../imports.php");

    restrictPageToAdministrators();
    
    if (isPostBackWithField("editVehicleAttempt")) {
        
        $editVehicleId = getPostFieldValue("editVehicleId", true);
        $editVehicle = BookingDatabase::getInstance()->getVehicleById($editVehicleId);

        $vehicle = new Vehicle();
        $vehicle->id = $editVehicle->id;
        $vehicle->registrationNo = getPostFieldValue("registrationNo", true);
        $vehicle->registrationDate = getDateInMySQLFormat(getPostFieldValue("registrationDate", true));
        $vehicle->vehicleModelId = intval(getPostFieldValue("vehicleModelId", true));
        
        BookingDatabase::getInstance()->updateVehicle($vehicle);    

        header("Location: vehicles.php");
        die();                            
    } 
    
    if(!isset($_GET["id"])) {
        header("Location: vehicles.php");
        die(); 
    }

    $requestedVehicleId = intval($_GET["id"]);

    $editVehicle = BookingDatabase::getInstance()->getVehicleById($requestedVehicleId);
    
    if($editVehicle == null) {
        header("Location: vehicles.php");
        die();        
    }    
    
    $vehicleModels = BookingDatabase::getInstance()->getAllVehicleModels();

    require_once("includes/admin_header.php");
    
    require_once("view/vehicles_edit_view.php");

    require_once("includes/admin_footer.php");

?>