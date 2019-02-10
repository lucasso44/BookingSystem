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
            <h3>Basket</h3>
        </div>
    </div>

    <?php if(getBasketSize() == 0) : ?>
        <p>There are no items in your basket.</p>
    <?php endif ?>
    <?php foreach($basketItems as $basketItem) : ?>
        <div class="media">
            <img src="assets/images/vehicleModels/<?= $basketItem->model ?>.jpg" width="100px" class="align-self-start mr-3" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= $basketItem->model ?></h5>
                <p><?= $basketItem->dateFrom ?> - <?= $basketItem->dateTo ?></p>
                <p>£<?= $basketItem->dailyRate ?> per day</p>
                <p><a class="btn btn-outline-danger" href="basket.php?cmd=remove&id=<?= $basketItem->id ?>" role="button">Cancel</a></p>
            </div>
        </div>
    <?php endforeach ?>
    <?php if(getBasketSize() > 0) : ?>
        <div class="row text-right">
            <div class="col-12">
                <a class="btn btn-success" href="checkout.php" role="button">Check Out</a>
            </div>
        </div>
    <?php endif ?>
    
</div>