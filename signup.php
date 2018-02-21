<?php
    $active = 'signup';
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
    <body>
        <?php include "header.php";?>
        <div class="container signup-container"  >
            <div class="signup-form-container">
                <h1 style='text-align: center; margin-bottom: 20px;'>Sign Up</h1>
                <form method='POST' action='profile.php'>
                    <div class="form-row">
                        <div class="form-group col-md-6">                        
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="institution">Current Institution</label>
                            <select type="name" class="form-control" name="institurion" required>
                                <option selected value="1">University of Utah</option>
                                <option value="2">Brigham Young University</option>
                                <option value="3">Salt Lake Community College</option>
                                <option value="4">Weber State University</option>
                                <option value="5">Utah Valley University</option>
                                <option value="6">Utah State University</option>
                                <option value="7">Dixie State College</option>
                                <option value="8">Snow College</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" value="Register">
                </form>
            </div>
        </div>
    </body>
    <?php include "footer.php";?>


</html>
