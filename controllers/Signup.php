<?php
if (isset($_POST['email'])) {
    require_once '../models/model.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = mysql_entities_fix_string($conn, $_POST['email']);
    $phone = $_POST['phone'];
    $institution_id = $_POST['institution_id'];

    // handle password hashing
    $salt1 = isset($_ENV['SALT1']) ? $_ENV['SALT1'] :'nlaosd73@#YHS)#@Jsafilj39';
    $salt2 = isset($_ENV['SALT2']) ? $_ENV['SALT2'] :'FASDa9spd^&SD)QMAOS#a02jaoj1amsnq@';
    $password = mysql_entities_fix_string($conn, $_POST['password']);
    $token = hash('ripemd128', "$salt1$password$salt2");

    $user = new User($first_name, $last_name, $token, $email, $phone, $institution_id);
    $user->insert();

    $obj = new UsersModel();
    $tmp = $obj->select("email = '$email'");

    // echo "user id: $user_id";
    $user_id = $tmp['user_id'];

    session_start();
    $_SESSION['username'] = $email;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['password'] = $password;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['institution_id'] = $institution_id;
    $_SESSION['phone'] = $phone;
    

    //forward to view page
    header("Location: ../views/index.php");
    exit();
}

function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>