<?php $active = 'listings';
require_once  '../utils.db_config.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die( "<div class='flash-message' style='position: relative;'>$conn->error</div>"  );

$query = "SELECT * FROM listings";

$result = $conn->query($query); 
if(!$result) die( "<div class='flash-message' style='position: relative;'>$conn->error</div>"  );

$rows = $result->num_rows;

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>       
        <?php include("header.php"); ?>
        <div class="container listings-container"  >
            <h1 class="home-title">Account Deletion</h1>
			<div class="container contact-form-container">
				<form method='post' action='deleteAccount.php'>
					<fieldset disabled>
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
					</fieldset>
                    <div class="form-group row">
                        <div class="col-lg">
							<p class="text-danger">Deleting your account will remove you from our database, as well as all of your ads listed below.</p>
                            <input type="submit" class="btn btn-danger" value="Delete Account">
                        </div>
                    </div>
                </form>
			</div>
		<hr>
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