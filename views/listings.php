<?php
$active = 'listings';
require_once '../models/model.php';
require_once '../utils/db_config.php';
session_start();

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$listings = isset($_GET['category']) ? $_SESSION['filteredListings'] : $_SESSION['listings'];

$categories_query = "SELECT * FROM category";
$categories_result = $conn->query($categories_query);
if (!$categories_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$categories = $categories_result->fetch_array(MYSQLI_NUM);
$category_count = $categories_result->num_rows;

?>

<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <div class="container listings-container"  >
            <h1 class="home-title" style="letter-spacing: 2px;">LISTINGS</h1>
            <div class="container" style="max-width: 100% !important">
                <div class="row form-row" style="justify-content: space-between;">
                    <form class="form-inline" method='post' action='../controllers/FilterListings.php'>
                        <div class="form-group mx-sm-3 mb-2 filter-select">
                            <select class="form-control" name='category_id'>
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

                    <form class="form-inline" method='post' action='../controllers/SearchListings.php'>
                        <div class="form-group mx-sm-3 mb-2 filter-select">
                            <input class="form-control" name="search_term">
                        </div>
                        <button type="submit" class="btn btn-outline-dark mb-2">
                                <span style="letter-spacing: 2px">SEARCH</span>
                                <i class="fas fa-search"></i>
                        </button>
                    </form>

<?php
if (isset($_GET['category'])) {
    echo <<<_END
        <div class='reset-button' style="margin-left: 5px;">
            <a href="../controllers/GetListings.php">
                <button class="btn btn-outline-dark mb-2">
                  <span style="letter-spacing: 2px">RESET</span>
                </button>
            </a>
        </div>
_END;
}
?>
                </div>
            </div>
            <div class="row">
<?php
foreach ($listings as $item) {
    echo <<<_END
<div class="col-sm-12 col-md-6 col-lg-3">
<a href="../controllers/ViewListing.php?listing_id=$item->listing_id">
    <div class="listing-card" style="background-image: url($item->image_url)">
        <div class="listing-card-price">$$item->price</div>
    </div>
</a>
</div>
_END;
}
?>
            </div>
        </div>
    </body>
</html>