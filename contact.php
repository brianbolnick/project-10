<?php $active = 'contact'; ?>
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
            <h1 class="home-title">Contact</h1>
			<div class="col-lg-auto col-md-auto col-sm-auto">
			<form>
			    <div class="form-group">
					<label for="contactName">Your Name</label>
					<input type="text" class="form-control" id="contactName" placeholder="Your name" required>
				</div>
				<div class="form-group">
					<label for="contactEmail">Email address</label>
					<input type="email" class="form-control" id="contactEmail" placeholder="Enter email" required>
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
					<label for="contactIssue">Reason for contact</label>
					<select class="form-control" id="contactIssue" required>
						<option>Account Issue</option>
						<option>General Question</option>
						<option>Listing Issue</option>
						<option>Report a Listing/User</option>
						<option>Other</option>
					</select>
				</div>
				<div class="form-group" required>
					<label for="contactDetails">Detailed description of issue</label>
					<textarea class="form-control" rows="3" id="fDescription"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>