<?php
    require_once("imports.php");

    if (isPostBackWithField("registerCustomerAttempt")) {

        $customer = new Customer();
        $customer->firstName = getPostFieldValue("firstName", true);
        $customer->lastName = getPostFieldValue("lastName", true);
        $customer->emailAddress = getPostFieldValue("emailAddress", true);
        $clearPassword = getPostFieldValue("password", true);
        $customer->password = md5($clearPassword);
        $customer->companyName = getPostFieldValue("companyName", true);
        $customer->phoneNo = getPostFieldValue("phoneNo", true);
        $customer->isAdministrator = false;
    
        BookingDatabase::getInstance()->addCustomer($customer);

        loginUser($customer->emailAddress, $clearPassword);

        header("Location: index.php");
        die();            
    }

    require_once("includes/header.php");

    require_once("view/signup_view.php");

    require_once("includes/footer.php");

?>