<?php
    require_once("imports.php");

    $bookingItemDetails = BookingDatabase::getInstance()->getBookingItemDetails($authUser);
    
    require_once("includes/header.php");

    require_once("view/bookings_view.php");

    require_once("includes/footer.php");

?>