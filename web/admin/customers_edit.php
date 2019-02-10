<?php

    require_once("../imports.php");

    restrictPageToAdministrators();
    
    if (isPostBackWithField("editCustomerAttempt")) {
        
        $editCustomer = BookingDatabase::getInstance()->getCustomerById(getPostFieldValue("editCustomerId", true));

        $customer = new Customer();
        $customer->id = $editCustomer->id;
        $customer->firstName = getPostFieldValue("firstName", true);
        $customer->lastName = getPostFieldValue("lastName", true);
        $customer->emailAddress = getPostFieldValue("emailAddress", true);

        $inputPassword = getPostFieldValue("password", true);
        $customer->password = $inputPassword == "" ? $editCustomer->password : md5($inputPassword);

        $customer->companyName = getPostFieldValue("companyName", true);
        $customer->phoneNo = getPostFieldValue("phoneNo", true);
        $customer->isAdministrator = getPostFieldValue("isAdministrator", false, "No") == "Yes";
        
        BookingDatabase::getInstance()->updateCustomer($customer);    

        header("Location: customers.php");
        die();                            
    } 
    
    if(!isset($_GET["id"])) {
        header("Location: customers.php");
        die(); 
    }

    $requestedCustomerId = intval($_GET["id"]);

    $editCustomer = BookingDatabase::getInstance()->getCustomerById($requestedCustomerId);
    
    if($editCustomer == null) {
        header("Location: customers.php");
        die();        
    }    

    require_once("includes/admin_header.php");
    
    require_once("view/customers_edit_view.php");

    require_once("includes/admin_footer.php");

?>