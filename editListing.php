<?php $active = 'editListing'; ?>
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
        <?php include("header.php"); ?>
        <div class="container home-container"  >
            <h1 class="home-title">Edit Listing</h1>     
        </div>
		        <div class="container add-container"  >
            <div class="add-form-container">
                <form>
                    <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="Title" class="form-control" id="InputTitle" placeholder="Title of the post">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input type="Description" class="form-control" id="inputDescription" placeholder="Description of the listing">
                    </div>
					<div class="form-group">
                        <label for="inputPrice">Price</label>
                        <input type="Price" id="inputPrice" placeholder="##.##">
                    </div>
					<div class="form-group" style="max-width: 100% !important">                
						<div class="row form-row1" >
							<form class="form-inline">
								<div class="form-group mx-sm-3 mb-2">
								<label for="inputCategory">Category</label>
									<select>
										<option>Arts and Entertainment</option>
										<option>Sporting Goods</option>
										<option>Electronics</option>
										<option>Furniture and Home Decor</option>
										<option>Pet Supplies</option>
										<option>Music and Instruments</option>
										<option>Culinary and Food</option>
										<option>Housing and Real Estate</option>
										<option>Tools and Hardware</option>
										<option>Books</option>
									</select>
								</div>
							</form>
						</div>
					</div>
                    <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" onclick="window.location.href='listings.php'">Update Listing</button>
                </form>
            </div>    
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>