<?php
if (isset($_POST['email'])) {
    require_once '../models/model.php';

    $email = mysql_entities_fix_string($conn, $_POST['email']);
    $password = mysql_entities_fix_string($conn, $_POST['password']);
    

    // handle password hashing (NOTE: These should NEVER be stored in the files themselves!)
    $salt1 = isset($_ENV['SALT1']) ? $_ENV['SALT1'] :'nlaosd73@#YHS)#@Jsafilj39';
    $salt2 = isset($_ENV['SALT@']) ? $_ENV['SALT@'] :'FASDa9spd^&SD)QMAOS#a02jaoj1amsnq@';
    $token = hash('ripemd128', "$salt1$password$salt2");

    //select user from db
    $obj = new UsersModel();
    $tmp = $obj->select("email = '$email'");

    //assign variables from db query
    $user_id = $tmp['user_id'];
    $db_password = $tmp['password'];
    $db_fn = $tmp['first_name'];
    $db_ln = $tmp['last_name'];
    $db_phone = $tmp['phone'];
    $db_inst = $tmp['institution_id'];

    //Compare passwords
    if ($token == $db_password) {

        //set session
        session_start();
        $_SESSION['username'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['password'] = $password;
        $_SESSION['first_name'] = $db_fn;
        $_SESSION['last_name'] = $db_ln;
        $_SESSION['phone'] = $db_phone;
        $_SESSION['institution_id'] = $db_inst;

        // //forward to view page
        header("Location: ../views/index.php");
        exit();
    } else {
        header("Location: ../views/login.php?message=There was an issue logging in. Please check your credentials.");
        exit();
    }
}


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	if(get_magic_quotes_gpc()) $string = stripslashes($string);
	return $conn->real_escape_string($string);
}

?>