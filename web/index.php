<?php
require_once("imports.php");

require_once("includes/header.php");

$promotions = BookingDatabase::getInstance()->getCurrentPromotions();

require_once("view/index_view.php");

require_once("includes/footer.php");

?>