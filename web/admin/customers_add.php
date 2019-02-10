<?php

    require_once("../imports.php");
    
    restrictPageToAdministrators();
    
    $addCustomerErrorMessage = "";

    if (isPostBackWithField("addCustomerAttempt")) {

        $customer = new Customer();
        $customer->firstName = getPostFieldValue("firstName", true);
        $customer->lastName = getPostFieldValue("lastName", true);
        $customer->emailAddress = getPostFieldValue("emailAddress", true);
        $customer->password = md5(getPostFieldValue("password", true));
        $customer->companyName = getPostFieldValue("companyName", true);
        $customer->phoneNo = getPostFieldValue("phoneNo", true);
        $customer->isAdministrator = getPostFieldValue("isAdministrator", false, "No") == "Yes";

        try
        {
            BookingDatabase::getInstance()->addCustomer($customer);
            header("Location: customers.php");
            die();
        }
        catch(AppException $aex) {
            $addCustomerErrorMessage = $aex->getMessage();
        }            
    }

    require_once("includes/admin_header.php");
    
    require_once("view/customers_add_view.php");

    require_once("includes/admin_footer.php");

?>