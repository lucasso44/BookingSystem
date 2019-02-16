<?php
require_once("imports.php");

$url = getRequestFieldValue("url", false);
$urlFrom = getRequestFieldValue("from", false);

if (isPostBackWithField("signinAttempt")) {
    if($authUser->isSignedIn) {

        if($url == "") {
            header("Location: index.php");
        }
        else {
            header("Location: $url");
        }
        die();
    }
}    
$failedAuthenticationMessage = getFailedAuthenticationMessage();

require_once("includes/header.php");

require_once("view/signin_view.php");

require_once("includes/footer.php");

?>