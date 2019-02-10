<div class="container mt-4">
    <h2 class="text-primary">Add vehicle</h2>   
    <div class="row">
        <div class="col-md-12">
            <form id="addvehicleForm" action="vehicles_add.php" method="POST">
                <input type="hidden" id="addVehicleAttempt" name="addVehicleAttempt" value="1">
                <div class="form-group">
                    <label for="vehicleModelId">Vehicle Model</label>                         
                    <select class="form-control" id="vehicleModelId" name="vehicleModelId">
                    <?php foreach ($vehicleModels as $vehicleModel):?>
                    <option value="<?=$vehicleModel->id?>"><?=$vehicleModel->model?></option>
                    <?php endforeach?>
                    </select>                                
                </div>
                <div class="form-group">
                    <label for="registrationNo">Registration Number</label>
                    <input type="text" class="form-control" id="registrationNo" name="registrationNo" placeholder="Registration Number">
                </div>                
                <div class="form-group">
                    <label for="registrationDate">Registration Date</label>
                    <input type="text" class="form-control" id="registrationDate" name="registrationDate" placeholder="Registration Date">
                </div>                               
                <button type="submit" class="btn btn-success">Add vehicle</button>       
                <a class="btn btn-primary" href="vehicles.php" role="button">Cancel</a>       
            </form>
        </div>
    </div>
</div>

<script>
   var maxDate = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    //the line 38 is picking up the actual field where the date is selected
    /*datepicker() is a javascript library tool that can be called and display 
    the actual window where the user can select the date
    format specify the format that the user have to follow in order to
    place the date into the database
    */
    $('#registrationDate').datepicker({
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        format: 'dd/mm/yyyy',
        maxDate: maxDate
    });

    $(document).ready(function() {
        $('#addvehicleForm').bootstrapValidator({
            fields: {
                registrationNo: {
                    validators: {
                        notEmpty: {
                            message: 'The registration number is required and cannot be empty. '
                        }
                    }
                },
                registrationDate: {
                    validators: {
                        notEmpty: {
                            message: 'The registration date is required and cannot be empty. '
                        }
                    }
                }           
            }
        });
    });
</script>