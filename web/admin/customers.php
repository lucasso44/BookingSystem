<?php

    require_once("../imports.php");

    restrictPageToAdministrators();
    
    $onCustomerDeletedMessage = "";

    if (isPostBackWithField("deleteCustomerAttempt")) {

        $deleteCustomerId = getPostFieldValue("deleteCustomerId", true);

        if($authUser->id == $deleteCustomerId) {
            $onCustomerDeletedMessage = "Just don't delete the current Customer!";
        }
        else {
            BookingDatabase::getInstance()->deleteCustomer($deleteCustomerId);
            $onCustomerDeletedMessage = "Customer successfully deleted";
        }
    }

    $customers = BookingDatabase::getInstance()->getAllCustomers();

    require_once("includes/admin_header.php");
       
    require_once("view/customers_view.php");

    require_once("includes/admin_footer.php");

?>