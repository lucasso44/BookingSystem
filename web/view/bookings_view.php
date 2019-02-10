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

    <?php if(sizeof($bookingItemDetails) == 0) : ?>
        <p>You currently have no bookings.</p>
    <?php endif ?>
    <?php foreach($bookingItemDetails as $bookingItemDetail) : ?>
        <div class="media">
            <img src="assets/images/vehicleModels/<?= $bookingItemDetail->vehicleModel ?>.jpg" width="100px" class="align-self-start mr-3" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= $bookingItemDetail->vehicleModel ?> (<?= $bookingItemDetail->vehicleRegistrationNo ?>)</h5>
                <p><?= $bookingItemDetail->dateFrom ?> - <?= $bookingItemDetail->dateTo ?></p>
            </div>
        </div>
    <?php endforeach ?>    
    
</div>