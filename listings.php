<?php
$active = 'listings';
require_once 'db_config.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

$listing_query = "SELECT * FROM listings";

$listing_result = $conn->query($listing_query);
if (!$listing_result) {
    die($conn->error);
}

$rows = $listing_result->num_rows;

$categories_query = "SELECT * FROM category";
$categories_result = $conn->query($categories_query);
if (!$categories_result) {
    die($conn->error);
}

$categories = $categories_result->fetch_array(MYSQLI_NUM);
$category_count = $categories_result->num_rows;

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
    <body style="background: #E4E5E7 !important;">
        <?php include "header.php";?>
        <div class="container listings-container"  >
            <h1 class="home-title" style="letter-spacing: 2px;">LISTINGS</h1>
            <div class="container" style="max-width: 100% !important">
                <div class="row form-row" >
                    <form class="form-inline">
                        <div class="form-group mx-sm-3 mb-2 filter-select">
                            <select class="form-control">
<?php
for ($j = 0; $j < $category_count; $j++) {
    $categories_result->data_seek($j);
    $row = $categories_result->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <option value=$row[0]>$row[1]</option>
_END;
}
?>
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
<?php
for ($j = 0; $j < $rows; $j++) {
    $listing_result->data_seek($j);
    $row = $listing_result->fetch_array(MYSQLI_NUM);
    echo <<<_END
<div class="col-sm-12 col-md-6 col-lg-3">
<a href="item-details.php?listing_id=$row[0]">
    <div class="listing-card" style="background-image: url($row[4])">
        <div class="listing-card-price">$$row[7]</div>
    </div>
</a>
</div>
_END;
}
?>
            </div>
        </div>
    </body>
    <?php include "footer.php";?>

</html>