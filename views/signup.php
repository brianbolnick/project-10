<?php
$active = 'signup';
require_once '../models/model.php';
require_once '../utils/db_config.php';
session_start();

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$categories_query = "SELECT * FROM institutions";
$categories_result = $conn->query($categories_query);
if (!$categories_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$categories = $categories_result->fetch_array(MYSQLI_NUM);
$category_count = $categories_result->num_rows;

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <div class="container signup-container"  >
            <div class="signup-form-container">
                <h1 style='text-align: center; margin-bottom: 20px;'>Sign Up</h1>
                <form method='POST' action='../controllers/Signup.php'>
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
                            <select type="name" class="form-control" name="institution_id" required>
<?php
for ($j = 0; $j < $category_count; $j++) {
    $categories_result->data_seek($j);
    $row = $categories_result->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <option value=$row[0]>$row[1]</option>
_END;
}
?>
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
