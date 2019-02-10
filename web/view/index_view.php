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

<!-- Modal -->
<div class="modal" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="messageModalBody"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container mainContentContainer">
    <div class="row">
        <div id="searchFormContainer" class="col-md-12 p-4 bg-success text-white border border-bginfo rounded shadow shadow-lg">
            <form id="searchForm" action="browse.php" method="GET">
                <div class="form-row">
                    <div class="form-group col-md-2 col-sm-6">
                        <label for="dateFrom">Date From</label>
                        <span data-container="body" 
                            data-toggle="popover" 
                            data-placement="top" 
                            data-content="Enter the date from when you want to book a vehicle."
                            style="color: #ffffff;"><i class="fas fa-xs fa-info-circle"></i></span>                        
                        <input id="dateFrom" name="dateFrom" class="controls form-control" type="text" placeholder="Date From" readonly>
                    </div>
                    <div class="form-group col-md-2 col-sm-6">
                        <label for="dateTo">Date To</label>
                        <span data-container="body" 
                            data-toggle="popover" 
                            data-placement="top" 
                            data-content="Enter the date until when you want to book a vehicle."
                            style="color: #ffffff;"><i class="fas fa-xs fa-info-circle"></i></span>                                                
                        <input id="dateTo" name="dateTo" class="controls form-control" type="text" placeholder="Date To" readonly>
                    </div>                  
                    <div class="form-group col-md-2 col-sm-6">
                        <label for="passengerNo">No of Passengers</label>
                        <span data-container="body" 
                            data-toggle="popover" 
                            data-placement="top" 
                            data-content="Enter the number of passengers the vehicle will carry."
                            style="color: #ffffff;"><i class="fas fa-xs fa-info-circle"></i></span>                                                
                        <input type="text" id="passengerNo" name="passengerNo" class="controls form-control" placeholder="No of Passengers">
                    </div>                                       
                    <div class="form-group col-md-2 col-sm-6">
                        <label for="vehicleStandardId">Vehicle Standard</label>
                        <span data-container="body" 
                            data-toggle="popover" 
                            data-placement="top" 
                            data-content="Enter the standard of vehicle you want to book."
                            style="color: #ffffff;"><i class="fas fa-xs fa-info-circle"></i></span>                                                
                        <select class="form-control" id="vehicleStandardId" name="vehicleStandardId">
                            <option value="0">All</option>
                            <option value="1">Standard</option>
                            <option value="2">Executive</option>
                            <option value="3">VIP</option>
                        </select>
                    </div>                    
                    <div class="form-group col-md-2 col-sm-6">
                        <label for="licenceCategoryId">Driving License</label>
                        <span data-container="body" 
                            data-toggle="popover" 
                            data-placement="top" 
                            data-content="If you want to self-drive enter the license category you hold otherwise select Driver Required."
                            style="color: #ffffff;"><i class="fas fa-xs fa-info-circle"></i></span>                                                
                        <select class="form-control" id="licenceCategoryId" name="licenceCategoryId">
                            <option value="0">Driver Required</option>
                            <option value="1">Minibus (D1)</option>
                            <option value="2">Bus (D)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-1 col-sm-6">
                        <label for="minDailyRate">Price (Min)</label>
                        <select class="form-control" id="minDailyRate" name="minDailyRate">
                            <option value="0">All</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                            <option value="110">110</option>
                            <option value="120">120</option>
                            <option value="130">130</option>
                            <option value="140">140</option>
                            <option value="150">150</option>
                            <option value="160">160</option>
                            <option value="170">170</option>
                            <option value="180">180</option>
                            <option value="190">190</option>
                            <option value="200">200</option>
                        </select>
                    </div>   
                    <div class="form-group col-md-1 col-sm-6">
                        <label for="maxDailyRate">Price (Max)</label>
                        <select class="form-control" id="maxDailyRate" name="maxDailyRate">
                            <option value="0">All</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                            <option value="70">70</option>
                            <option value="80">80</option>
                            <option value="90">90</option>
                            <option value="100">100</option>
                            <option value="110">110</option>
                            <option value="120">120</option>
                            <option value="130">130</option>
                            <option value="140">140</option>
                            <option value="150">150</option>
                            <option value="160">160</option>
                            <option value="170">170</option>
                            <option value="180">180</option>
                            <option value="190">190</option>
                            <option value="200">200</option>                            
                        </select>
                    </div>                                                                                                                                   
                </div>
                <button type="submit" class="btn btn-primary float-right">Search for Vehicles</button>
            </form>
            <script>
                $(function () {
                    $('[data-toggle="popover"]').popover()
                })  

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

                $(document).ready(function(){
                    $('#searchForm').on('submit', function(e){
                        e.preventDefault();
                        var minPrice = $('#minDailyRate').val();
                        var maxPrice = $('#maxDailyRate').val();
                        var dateFrom = $('#dateFrom').val();
                        var dateTo = $('#dateTo').val();
                        var passengerNo = $('#passengerNo').val();

                        if (dateFrom == "" || dateTo == "") {
                            $('#messageModalTitle').html('Search for Vehicle');
                            $('#messageModalBody').html('Please select a Date From and Date To.');
                            $('#messageModal').modal('show');
                            return;
                        }

                        if (passengerNo == "" || isNaN(passengerNo)) {
                            $('#messageModalTitle').html('Search for Vehicle');
                            $('#messageModalBody').html('Please enter No of Passengers.');
                            $('#messageModal').modal('show');
                            return;
                        }

                        if (minPrice > maxPrice) {
                            $('#messageModalTitle').html('Search for Vehicle');
                            $('#messageModalBody').html('Price (Min) must be less than Price (Max).');
                            $('#messageModal').modal('show');
                            return;
                        }

                        this.submit();
                    });
                });
            </script>                      
        </div>
    </div>        
</div>

<div class="container bg-light border rounded p-4">
    <div class="row">
        <div class="col-md-12">
            <h3>Promotions</h3>
        </div>
    </div>
    <div class="row">
        <?php foreach($promotions as $promotion):?>
            <div class="col-md-4">
                <div class="card m-4" style="width: 18rem;">
                    <img class="card-img-top" src="http://www.parkhurst.biz/images/rental/HK.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $promotion->title?></h5>
                        <p class="card-text"><?= $promotion->info?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php endforeach?>
    </div>
</div>