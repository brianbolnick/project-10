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
    <head>
        <meta charset="utf-8">
        <title>SellOut | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="./styles/custom.css" >

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    </head>
    <body>       
        <?php include("header.php"); ?>
        <div class="container listings-container"  >
            <h1 class="home-title">My Account</h1>
			<div class="container contact-form-container">
				<form method='post' action='profile.php'>
                    <div class="form-group row">
                        <label for="fName" class="col-lg-3 col-form-label form-control-label">First name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="fName" value="Test">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lName" class="col-lg-3 col-form-label form-control-label">Last name</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="lName" value="User">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-lg-3 col-form-label form-control-label">Email</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="email" id="email" value="no@email.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-lg-3 col-form-label form-control-label">Phone</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="tel" id="phone" value="801-123-4567">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Current School</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" id="institution" value="University of Utah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Password</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="password" id="password" value="11111122333">
                        </div>
                    </div>
                    <div class="form-group row">
						<div class="col-lg">
                            <input type="submit" class="btn btn-primary" value="Save Changes">
							<div class="float-md-right float-none">
								<a class="btn btn-danger" href="deleteAccount.php">Delete Account</a>
							</div>
						</div>
                    </div>
                </form>
			</div>
		<div class="row">
		<div class="col">
			<h1 class="home-title">My Listings</h1>
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
	<div class="card mt-3">
	<div class="card-img-top">
		<a href="item-details.php">
			<div class="listing-card" style="background-image: url($row[4])">                                                            
				<div class="listing-card-price">$$row[7]</div>
			</div>
		</a>
	</div>
	<div class="card-footer">
		<a href="editListing.php" class="col-sm-4 btn btn-warning">Edit</a>   <a href="deleteListing.php" class="col-sm-4 btn btn-danger">Delete</a>
	</div>
	</div>
</div>
_END;
}
?>
    </div>
	</div>
	</body>
    <?php include("footer.php"); ?>

</html>