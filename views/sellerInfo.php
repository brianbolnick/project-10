<?php $active = 'listings';
require_once  'db_config.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM listings";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

?>
<!doctype html>
<html>
	<?php include "head.php"?>
    <body>       
        <?php include("header.php"); ?>
        <div class="container listings-container"  >
            <h1 class="home-title">Seller Info</h1>
			<div class="container contact-form-container">
				<div class="row">
					<div class="text-right col-lg-6 col-md-4 col-sm-2">
						<h3>Name:</h3>
					</div>
					<div class="text-left col-lg-6 col-md-4 col-sm-2">
						<h3>Test User</h3>
					</div>
				</div>
				<div class="row">
					<div class="text-right col-lg-6 col-md-4 col-sm-2">
						<h3>Institution:</h3>
					</div>
					<div class="text-left col-lg-6 col-md-4 col-sm-2">
						<h3>University of Utah</h3>
					</div>
				</div>
				<div class="row">
				<div class="col-lg">
					<a class="btn btn-outline-primary">Contact Seller</a>
				</div>
				</div>
			</div>
		<div class="row">
		<div class="col">
			<h1 class="home-title">Listings</h1>
			</div>
		</div>
		<div class="row">
		<?php
for($j=0; $j<$rows; $j++)
{
$result->data_seek($j); 
$row = $result->fetch_array(MYSQLI_NUM); 
echo <<<_END
<div class="col-sm-12 col-md-6 col-lg-3">
<a href="item-details.php">
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
    <?php include("footer.php"); ?>

</html>