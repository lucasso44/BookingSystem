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
            <p>Thank you for your order.</p>
        </div>
    </div>

    <?php if($checkOutMessage != "") : ?>
        <div class="alert alert-danger" role="alert">
            <?= $checkOutMessage ?>
        </div>    
    <?php endif ?> 

    <?php if(getBasketSize() == 0) : ?>
        <p>There are no items in your basket.</p>
    <?php endif ?>
    <?php foreach($basketItems as $basketItem) : ?>
        <div class="media">
            <img src="assets/images/vehicleModels/<?= $basketItem->model ?>.jpg" width="100px" class="align-self-start mr-3" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= $basketItem->model ?> (<?= $basketItem->vehicleId == 0 ? "<span class='text-danger'>Unallocated</span>" : "<span class='text-success'>Allocated</span>" ?>)</h5>
                <p><?= $basketItem->dateFrom ?> - <?= $basketItem->dateTo ?></p>
                <p>£<?= $basketItem->dailyRate ?> per day</p>
            </div>
        </div>
    <?php endforeach ?>

    <div class="row text-right">
        <div class="col-12">
            <a class="btn btn-outline-success" href="browse.php" role="button">Browse for Vehicles</a>
        </div>
    </div>
    
</div>