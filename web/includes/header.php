<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css"/>
    <script src="https://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js" type="text/javascript"></script>    
    <link rel="stylesheet" href="assets/css/style.v1.css" />
    <title>Berwyn Buses Hire Ltd</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  </head>
  <body>

    <?php if(((basename($_SERVER['PHP_SELF']) != "signin.php") && (basename($_SERVER['PHP_SELF']) != "signup.php")) && ($authUser->isSignedIn == 0)) : ?>
    <div class="modal" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinModalTitle">Sign In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="signinModalBody" class="modal-body">
                    <p><strong>Existing Customer</strong></p>
                    <form id="signinForm" action="<?= basename($_SERVER['PHP_SELF']) ?>" method="POST">
                        <input type="hidden" id="signinAttempt" name="signinAttempt" value="1">
                        <div class="form-group">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </form> 
                    <p><strong>New Customer</strong></p>
                    <span><a href="signup.php">Sign up</a> for an account.</span> 
                </div>
                <div class="modal-footer">
                    <button id="signinButton" type="submit" class="btn btn-success">Sign In</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#signinButton').on('click', function(e){
                $('#signinForm').submit();
            });
        });    
    </script>
    <?php endif ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/coach.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Berwyn Buses Hire Ltd           
            </a>        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link" href="browse.php"><i class="fas fa-bus"></i>&nbsp;Browse</a>
                    <!-- <a class="nav-item nav-link" href="#">Why Us</a>
                    <a class="nav-item nav-link" href="#">Our Services</a>
                    <a class="nav-item nav-link" href="#">Contact Us</a> -->
                </div>
                <div class="navbar-nav">
                    <?php if($authUser->isSignedIn == 1) : ?>
                    <a class="nav-item nav-link" href="bookings.php"><i class="fas fa-tasks"></i>&nbsp;My Bookings</a>                
                    <?php endif ?>
                    <a class="nav-item nav-link" href="basket.php"><i class="fas fa-shopping-basket"></i>&nbsp;View Basket 
                    <?php if(getBasketSize() > 0 && basename($_SERVER['PHP_SELF']) != "checkout.php") : ?>
                        <span class="badge badge-pill badge-success"><?= getBasketSize() ?></span>
                    <?php endif ?>
                    </a>                
                    <?php if($authUser->isSignedIn == 1) : ?>
                    <a class="nav-item nav-link" href="signout.php"><i class="fas fa-user"></i>&nbsp;Sign Out</a>
                    <?php else : ?>                
                    <?php if((basename($_SERVER['PHP_SELF']) != "signin.php") && (basename($_SERVER['PHP_SELF']) != "signup.php")) : ?>
                    <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#signinModal"><i class="fas fa-user"></i>&nbsp;Sign In</a>
                    <?php endif ?>
                    <?php endif ?>
                    <?php if($authUser->isAdministrator == 1) : ?>
                    <a class="nav-item nav-link" href="admin/index.php"><i class="fas fa-cog"></i>&nbsp;Admin</a>
                    <?php endif ?>
                </div>                
            </div>
        </nav>
    </header>

    <main role="main">
    <div id="contentWrapper" class="container-fluid">
    <?php if($authUser->isSignedIn == 1) : ?>
        <h5>Welcome <?= $authUser->firstName ?></h5>
    <?php endif ?>
    