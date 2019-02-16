<?php
    require_once("imports.php");

    $cmd = getRequestFieldValue("cmd", false, "");

    $bookingItemMessage = "";

    if($cmd == "remove") {
        $id = intval(getRequestFieldValue("id", true, "0"));
        BookingDatabase::getInstance()->deleteBookingItemById($id);
        $bookingItemMessage = "Booking No $id has been cancelled.";
    }

    $bookingItemDetails = BookingDatabase::getInstance()->getBookingItemDetails($authUser);
    
    require_once("includes/header.php");

    require_once("view/bookings_view.php");

    require_once("includes/footer.php");

?>