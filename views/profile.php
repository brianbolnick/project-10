<?php $active = 'profile';
require_once '../utils/db_config.php';

$message= '';
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    $message = 'You must be signed in to access that page.';
    header("Location: ./login.php?message=You must be signed in to access that page.");
}

$name = (isset($_POST['first_name'])) ? $_POST['first_name'] : "";

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die( "<div class='flash-message' style='position: relative;'>$conn->error</div>"  );
}

$query = "SELECT * FROM listings";

$result = $conn->query($query);
if (!$result) {
    die( "<div class='flash-message' style='position: relative;'>$conn->error</div>"  );
}

$rows = $result->num_rows;

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <?php echo $name ?>
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
								<a class="btn btn-danger" href="delete-account.php">Delete Account</a>
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
for ($j = 0; $j < $rows; $j++) {
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
		<a href="edit-listing.php" class="col-sm-4 btn btn-warning">Edit</a>   <a href="delete-listing.php" class="col-sm-4 btn btn-danger">Delete</a>
	</div>
	</div>
</div>
_END;
}
?>
    </div>
	</div>
	</body>
    <?php include "footer.php";?>

</html>