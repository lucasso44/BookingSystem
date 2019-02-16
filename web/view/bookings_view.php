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
            <h3>My Bookings</h3>
        </div>
    </div>
    <?php if($bookingItemMessage != "") : ?>
        <div class="alert alert-warning" role="alert">
            <?= $bookingItemMessage ?>
        </div>     
    <?php endif ?>
    <?php if(sizeof($bookingItemDetails) == 0) : ?>
        <div class="alert alert-success" role="alert">
            You currently have no bookings.
        </div>     
    <?php endif ?>
    <?php foreach($bookingItemDetails as $bookingItemDetail) : ?>
        <div class="media my-2 p-2 border rounded">
            <img src="assets/images/vehicleModels/<?= $bookingItemDetail->vehicleModel ?>.jpg" width="100px" class="align-self-start mr-3" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= '<em>Booking No '.$bookingItemDetail->id.'</em> - '.$bookingItemDetail->vehicleModel ?> (<?= $bookingItemDetail->vehicleRegistrationNo ?>)</h5>
                <p><?= getDateInUKFormat($bookingItemDetail->dateFrom) ?> - <?= getDateInUKFormat($bookingItemDetail->dateTo) ?><br/>
                <?php if($bookingItemDetail->isSelfDriving == 0) : ?>
                    From:&nbsp;<?= $bookingItemDetail->placeFrom?><br/>To:&nbsp;<?=$bookingItemDetail->placeTo?>
                <?php else : ?>
                    Self Driving
                <?php endif ?>
                </p>
                <?php if(new DateTime($bookingItemDetail->dateFrom) > new DateTime()) : ?>
                <a class="btn btn-outline-danger" href="bookings.php?cmd=remove&id=<?= $bookingItemDetail->id ?>" role="button">Cancel</a>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>    
    
    <div class="row text-right">
        <div class="col-12">
            <a class="btn btn-outline-primary" href="browse.php?revisit=1" role="button">Search for Vehicles</a>
        </div>
    </div>    
</div>