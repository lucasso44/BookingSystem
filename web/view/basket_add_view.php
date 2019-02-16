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

<div class="container mainContentContainer" >
    <div class="row justify-content-center">
        <div class="col-md-6 border bg-white rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="signinModalTitle">Add To Basket</h5>
            </div>
            <div class="modal-body">
                <img src="assets/images/vehicleModels/<?= $vehicleModel->model ?>.jpg" alt="<?= $vehicleModel->model ?>" width="100%">
                <p>Please use the form below to add a '<?= $vehicleModel->model ?>' for <?= $promotion == null ? '' : 'a special promotional rate of ' ?>£<?= $vehicleModel->dailyRate ?> per day to your basket.</p>
                <?php if($vehicleModelQuery->licenceCategoryId > 0) : ?>
                    <div class="col-12 alert alert-warning" role="alert">
                        You have opted for self drive. Your own driver must provide a '<?= $vehicleModel->category ?>' license.
                    </div>
                <?php elseif (!$isDirect): ?>
                    <div class="col-12 alert alert-warning" role="alert">
                        You have opted for a driver.
                    </div>
                <?php endif ?>
                <?php if($processingMessage != "") : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $processingMessage ?>   
                    </div>    
                <?php endif ?>
                <?php if($isDirect) : ?>
                <div id="selfDrivingAlertOff" class="col-12 alert alert-warning" role="alert" style="<?= $isDirect ? '' : 'display:none;' ?>">
                        You have opted for a driver.
                    </div>                
                <div id="selfDrivingAlert" class="col-12 alert alert-warning" role="alert" style="display:none;">
                        You have opted for self drive. Your own driver must provide a valid license.
                </div>                  
                <?php endif ?>              
                <form id="addBasketItemForm" action="basket_add.php" method="POST">
                    <input type="hidden" id="addBookingItemAttempt" name="addBookingItemAttempt" value="1">
                    <input type="hidden" id="url" name="url" value="<?= $url ?>">
                    <input type="hidden" id="dailyRate" name="dailyRate" value="<?= $vehicleModel->dailyRate ?>">
                    <input type="hidden" id="vehicleModelId" name="vehicleModelId" value="<?= $vehicleModel->id ?>">
                    <input type="hidden" id="licenceCategoryId" name="licenceCategoryId" value="<?= $vehicleModelQuery->licenceCategoryId ?>">
                    <?php if($isDirect) : ?>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Yes" id="isSelfDriving" name="isSelfDriving">
                            <label class="form-check-label" for="isSelfDriving">
                                Self Drive
                            </label>
                        </div>                    
                    </div>
                    <?php endif ?>                    
                    <?php if($vehicleModelQuery->licenceCategoryId == 0) : ?>
                        <div id="placeFromRow" class="form-group">
                            <label for="placeFrom">Place From</label>
                            <input type="text" class="form-control" id="placeFrom" name="placeFrom" placeholder="Place From">
                        </div>
                        <div  id="placeToRow"class="form-group">
                            <label for="placeTo">Place To</label>
                            <input type="text" class="form-control" id="placeTo" name="placeTo" placeholder="Place To">
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="dateFrom">Date From</label>
                        <input type="text" class="form-control" id="dateFrom" name="dateFrom" placeholder="Date From" value="<?= getDateInUKFormat($vehicleModelQuery->dateFrom) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="dateTo">Date To</label>
                        <input type="text" class="form-control" id="dateTo" name="dateTo" placeholder="Date To" value="<?= getDateInUKFormat($vehicleModelQuery->dateTo) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="passengerNo">No of Passengers</label>
                        <input type="text" class="form-control" id="passengerNo" name="passengerNo" placeholder="No of Passengers" value="<?= $vehicleModelQuery->passengerNo == 0 ? "" : $vehicleModelQuery->passengerNo ?>">
                    </div>
                    <?php if($vehicleModelQuery->licenceCategoryId == 0) : ?>
                    <div id="preferredDriverRow" class="form-group">
                        <label for="preferredDriver">Preferred Driver</label>
                        <input type="text" class="form-control" id="preferredDriver" name="preferredDriver" placeholder="Preferred Driver">
                    </div>
                    <?php endif ?>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add to Basket</button>
                        <a class="btn btn-primary" href="<?= $url == '' ? 'browse.php?revisit=1' : $url ?>" role="button">Cancel</a>                                        
                    </div>    
                </form> 
            </div>        
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#addBasketItemForm').bootstrapValidator({
        fields: {
            placeFrom: {
                validators: {
                    notEmpty: {
                        message: 'Place From is required and cannot be empty. '
                    }
                }
            },
            placeTo: {
                validators: {
                    notEmpty: {
                        message: 'Place To is required and cannot be empty. '
                    }
                }
            },
            passengerNo: {
                validators: {
                    notEmpty: {
                        message: 'No of Passengers is required and cannot be empty. '
                    },
                    numeric: {
                        message: 'No of Passengers must be a number'
                    }
                }
            }                
        }
    });
});
</script>

<script>

    

    <?php if($isDirect) : ?>
    $('#isSelfDriving').click(function(){
        if($(this).prop("checked") == true) {
            $('#selfDrivingAlertOff').hide();
            $('#selfDrivingAlert').show();
            $('#placeFromRow').hide();
            $('#placeToRow').hide();
            $('#preferredDriverRow').hide();
        }
        else {
            $('#selfDrivingAlertOff').show();
            $('#selfDrivingAlert').hide();
            $('#placeFromRow').show();
            $('#placeToRow').show();
            $('#preferredDriverRow').show();
        }
    });
    <?php endif ?>

    var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

    $('#dateFrom').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy',
        minDate: today,
        maxDate: function () {
            return $('#dateTo').val();
        }
    });

    $('#dateTo').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy',
        minDate: function () {
            return $('#dateFrom').val();
        }
    });

    function initAutocompleteForFromAndTo() {   
        initAutocompleteForInput('placeFrom');
        initAutocompleteForInput('placeTo');
    }

    function initAutocompleteForInput(inputId) {   
        // Create the search box and link it to the UI element.
        var input = document.getElementById(inputId);
        var searchBox = new google.maps.places.SearchBox(input);

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
        });          
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdciYim1wV5Xly1NwQWNdlYKzT8g3V6_w&libraries=places&callback=initAutocompleteForFromAndTo" async defer></script>