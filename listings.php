<?php $active = 'listings'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SellOut | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="./styles/styles.css" >

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    </head>
    <body style="background: #E4E5E7 !important;">       
        <?php include("header.php"); ?>
        <div class="container listings-container"  >
            <h1 class="home-title" style="letter-spacing: 2px;">LISTINGS</h1>
            <div class="container" style="max-width: 100% !important">                
                <div class="row form-row" >
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2 filter-select">
                            <select class="form-control">
                                <option>Arts and Entertainment</option>
                                <option>Sporting Goods</option>
                                <option>Electronics</option>
                                <option>Furniture and Home Decor</option>
                                <option>Pet Supplies</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-outline-dark mb-2">
                            <span style="letter-spacing: 2px">FILTER</span>
                            <i class="fas fa-filter"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/270640/pexels-photo-270640.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$2</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/115558/pexels-photo-115558.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$15</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/247932/pexels-photo-247932.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$7</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/261909/pexels-photo-261909.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$57</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/325876/pexels-photo-325876.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$22</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/704971/pexels-photo-704971.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$14</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/8263/pexels-photo.jpg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$5</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/374631/pexels-photo-374631.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$92</div>
                        </div>
                    </a>
                </div>                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="item-details.php">
                        <div class="listing-card" style="background-image: url(https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?h=350&dpr=2&auto=compress&cs=tinysrgb)">                                                            
                            <div class="listing-card-price">$17</div>
                        </div>
                    </a>
                </div>                
                

            </div>
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>