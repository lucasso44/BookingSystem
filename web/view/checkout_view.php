<div id="jumbotron" class="jumbotron jumbotron text-white">
    <div class="container">
        <h1 class="display-4">Discover Places</h1>
        <p class="lead">The safe and reliable way to hire great value transport across London and the South East.</p>
    </div>
    <style>
        #jumbotron{
            background-image: url("assets/images/travel.png");
            background-position: center;
        }
    </style>    
</div>

<div class="container mainContentContainer bg-white border rounded p-4">

    <div class="row">
        <div class="col-12">
            <h3>Checkout</h3>
            <?php if(getBasketSize() > 0) : ?>
                <div class="alert alert-success" role="alert">
                    Thank you, your order has been received.
                </div> 
            <?php endif ?>
        </div>
    </div>

    <?php if($checkOutMessage != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $checkOutMessage ?>
        </div>    
    <?php endif ?> 

    <?php if(getBasketSize() == 0) : ?>
        <div class="alert alert-success" role="alert">
            There are no items in your basket.
        </div>        
    <?php endif ?>
    <?php foreach($basketItems as $basketItem) : ?>
        <div class="media my-2 p-2 border rounded">
            <img src="assets/images/vehicleModels/<?= $basketItem->model ?>.jpg" width="100px" class="align-self-start mr-3" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= '<em>Booking No '.$basketItem->bookingItemId.'</em> - '.$basketItem->model ?> (<?= $basketItem->vehicleId == 0 ? "<span class='text-danger'>Unallocated</span>" : "<span class='text-success'>Allocated</span>" ?>)</h5>
                <p><?= getDateInUKFormat($basketItem->dateFrom) ?> - <?= getDateInUKFormat($basketItem->dateTo) ?><br/>
                £<?= $basketItem->dailyRate ?> per day<br/>
                <?php if($basketItem->isSelfDriving == 0) : ?>
                    From:&nbsp;<?= $basketItem->placeFrom?><br/>To:&nbsp;<?=$basketItem->placeTo?>
                <?php else : ?>
                    Self Driving
                <?php endif ?>
                </p> 
            </div>
        </div>
    <?php endforeach ?>

    <div class="row text-right">
        <div class="col-12">
            <a class="btn btn-outline-primary" href="browse.php?revisit=1" role="button">Search for Vehicles</a>
        </div>
    </div>
    
</div>