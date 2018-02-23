<?php
    $active = 'signup';
?>
<!doctype html>
<html>
    <?php include "head.php"?>
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
