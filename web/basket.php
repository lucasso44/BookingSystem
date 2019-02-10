<?php
    require_once("imports.php");

    $cmd = getRequestFieldValue("cmd", false, "");

    if($cmd == "remove") {
        $id = intval(getRequestFieldValue("id", true, "0"));
        if($id > 0) {
            $basketItems = getBasketItems();
            for($i = 0; $i < sizeof($basketItems); $i++) {
                if($basketItems[$i]->id == $id) {
                    unset($basketItems[$i]);
                    break;
                }
            }
            setBasketItems($basketItems);
        }
    }

    $basketItems = getBasketItems();

    require_once("includes/header.php");

    require_once("view/basket_view.php");

    require_once("includes/footer.php");

?>