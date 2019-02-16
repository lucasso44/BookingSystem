<?php
require_once("imports.php");

$addedToBasket = intval(getRequestFieldValue("addedToBasket", false, "0")) == 1;
$addedToBasketMessage = $addedToBasket ? "Order added to your basket" : "";

if(isset($_SESSION["vehicleModelQuery"])) {
    $vehicleModelQuery = $_SESSION["vehicleModelQuery"];
}
else {    
    $vehicleModelQuery = new VehicleModelQuery();

    $dateFrom = new DateTime();
    $dateFrom->add(new DateInterval("P1D"));

    $dateTo = new DateTime();
    $dateTo->add(new DateInterval("P2D"));
    
    $vehicleModelQuery->dateFrom = getDateInMySQLFormat(getRequestFieldValue("dateFrom", false, $dateFrom->format("d/m/Y")));
    $vehicleModelQuery->dateTo = getDateInMySQLFormat(getRequestFieldValue("dateTo", false, $dateTo->format("d/m/Y")));
    $vehicleModelQuery->passengerNo = intval(getRequestFieldValue("passengerNo", false, "0"));
    $vehicleModelQuery->vehicleStandardId = intval(getRequestFieldValue("vehicleStandardId", false, "0"));
    $vehicleModelQuery->licenceCategoryId = intval(getRequestFieldValue("licenceCategoryId", false, "0"));
    $vehicleModelQuery->minDailyRate = intval(getRequestFieldValue("minDailyRate", false, "0"));
    $vehicleModelQuery->maxDailyRate = intval(getRequestFieldValue("maxDailyRate", false, "0"));
    $_SESSION["vehicleModelQuery"] = $vehicleModelQuery;
}

require_once("includes/header.php");

require_once("view/index_view.php");

require_once("includes/footer.php");

?>