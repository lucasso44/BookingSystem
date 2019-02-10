<?php
require_once("imports.php");

$cmd = getRequestFieldValue("cmd", false, "");

$data = null;

switch($cmd) {
    case "getAllVehicleModels":
        $data = BookingDatabase::getInstance()->getAllVehicleModels();
        break;
    case "getBookingReport": 
        $data = BookingDatabase::getInstance()->getBookingReport();
        break;
    default:
        throw new AppException("Invalid cmd querystring parameter");
}


?>

<?= json_response($data, 200, false, "Success") ?>