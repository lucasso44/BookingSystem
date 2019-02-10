<?php
require_once("imports.php");

if (isPostBackWithField("signinAttempt")) {
    if($authUser->isSignedIn) {
        header("Location: index.php");
        die();
    }
}    
$failedAuthenticationMessage = getFailedAuthenticationMessage();

require_once("includes/header.php");

require_once("view/signin_view.php");

require_once("includes/footer.php");

?>