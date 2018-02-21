<?php
$active = 'listings';
require_once 'db_config.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

if (isset($_GET['listing_id'])) {

    $listing_id = $_GET['listing_id'];

    $query = "select * from listings where listing_id='$listing_id' ";
    $result = $conn->query($query);
    if (!$result) {
        die($conn->error);
    }

    $data = $result->fetch_array(MYSQLI_NUM);
}

?>
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
    <body>
        <?php include "header.php";?>
        <div class="container item-container">
            <div class="item-details-container">
                <h1 class="listing-title"><?php echo $data[2] ?></h1>
                <div class="row">
                    <div class="col-6">
                        <img src=<?php echo $data[4] ?>  alt="" width='100%'>
                        <br>
                        <a href="contact-seller.php?seller_id=1">
                            <button type="button" class="btn btn-outline-dark home-listing-button">
                                <span style="font-size: 1rem; margin-right: 10px;">Contact Seller</span>
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <div class="listing-description">
                            <div class="description-title">Description:</div>
                            <div class="description"><?php echo $data[3] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">Category:</div>
                            <div class="description"><?php echo $data[5] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">City:</div>
                            <div class="description"><?php echo $data[6] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">Price:</div>
                            <div class="description">$<?php echo $data[7] ?></div>
                        </div>
                        <div class="listing-description">
                            <div class="description-title">List Date:</div>
                            <div class="description"><?php echo $data[8] ?></div>
                        </div>
                    </div>
            </div>
        </div>
    </body>
    <?php include "footer.php";?>

</html>