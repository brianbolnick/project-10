<?php 
$active = 'deleteListing';
require_once '../utils/check_session.php';
?>
<!doctype html>
<html>
    <?php include "head.php";?>
    <body>
        <?php include "header.php";?>
        <div class="container home-container"  >
            <h1 class="home-title">Delete Listing</h1>
        </div>
		<div class="container add-container"  >
			<div class="del-form-container">
				<form>
					<div class="form-group">
						<button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" onclick="window.location.href='listings.php'">Confirm Removal of Listing</button>
					</div>
				</form>
			</div>
		</div>
    </body>
    <?php include "footer.php";?>

</html>