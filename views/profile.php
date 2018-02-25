<?php $active = 'profile';
require_once '../utils/db_config.php';
require_once '../utils/check_session.php';
$message = '';
session_start();

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM listings where user_id = '$user_id'";

$result = $conn->query($query);
if (!$result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$rows = $result->num_rows;
$inst_id = $_SESSION['institution_id'];

$inst = "Select * from institutions where institution_id = '$inst_id' ";

$inst_result = $conn->query($inst);
if (!$inst_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$inst_data = $inst_result->fetch_assoc();
$institution = $inst_data['name'];
$city = $inst_data['city'];
$state = $inst_data['state'];
?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php 
        include "header.php";
        if (isset($_GET['message'])) {
            echo '<div class="flash-message">';
            echo $_GET['message'];
            echo '</div>';
        }
        ?>
        <div class="container profile-container"  >
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <div class="profile-card-heading">

                    </div>
                    <div class="img-container">
                        <div class="profile-card-img"></div>
                    </div>
                    <div class="profile-card-body">
                        <div class="profile-name">
                            <?php
                            echo "<span>" . $_SESSION['first_name'] . "</span>";
                            echo " <span>" . $_SESSION['last_name'] . "</span>";
                            ?>
                        </div>
                        <div class="profile-location">
                            <?php echo "$city, $state" ?>
                        </div>
                        <div class="profile-contact">
                            <?php
                            echo "<div class='contact'><i class='far fa-envelope-open'></i> " . $_SESSION['username'] . "</div>";
                            echo " <div class='contact'><i class='fas fa-phone'></i> " . $_SESSION['phone'] . "</div>";
                            echo " <div class='contact'><i class='fas fa-graduation-cap'></i> " . $institution . "</div>";
                            ?>
                        </div>
                        <div class="profile-options">
                            <a class='profile-option' href="./edit-profile.php">Edit Profile</a>
                            <a class='profile-option' href="./create-listing.php">New Listing</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <h2>My Listings</h2>
                    <div class="row">                    
		<?php
for ($j = 0; $j < $rows; $j++) {
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    $img = $row['image_url'];
    $price = $row['price'];
    $id = $row['listing_id'];
    echo <<<_END
    <div class="col-md-6">
    <a href="../controllers/ViewListing.php?listing_id=$id">
        <div class="profile-listing-card">
            <div class="profile-listing-card-image" style="background: url($img);">
            </div>
            <div class="profile-listing-card-options">
                <a class='profile-option' href="../controllers/EditListing.php?listing_id=$id">Edit</a>
                <a class='profile-option' href="../controllers/DeleteListing.php?listing_id=$id">Delete</a>
            </div>
        </div>  
    </a>                        
</div>
_END;
}
?>

                </div>
            </div>
        </div>

            </div>
	    </div>
	</body>
</html>