<?php
if (isset($_POST['email'])) {
    require_once '../models/model.php';
    session_start();

    if (empty($_POST['password'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = mysql_entities_fix_string($conn, $_POST['email']);
        $phone = $_POST['phone'];
        $institution_id = $_POST['institution_id'];
        $user_id = $_SESSION['user_id'];
    
        $obj = new UsersModel();
        $user = $obj->select("user_id = '$user_id'");
        $password = $user['password'];
        $obj->update($first_name, $last_name, $password, $email, $phone, $institution_id, $user_id);
    
        $_SESSION['username'] = $email;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['password'] = $password;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['institution_id'] = $institution_id;
        $_SESSION['phone'] = $phone;
    
        header("Location: ../views/profile.php?message=Successfully Updated");
        exit();
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = mysql_entities_fix_string($conn, $_POST['email']);
    $phone = $_POST['phone'];
    $institution_id = $_POST['institution_id'];
    $user_id = $_SESSION['user_id'];

    $salt1 = 'nlaosd73@#YHS)#@Jsafilj39';
    $salt2 = 'FASDa9spd^&SD)QMAOS#a02jaoj1amsnq@';
    $password = mysql_entities_fix_string($conn, $_POST['password']);
    $token = hash('ripemd128', "$salt1$password$salt2");

    $obj = new UsersModel();
    $obj->update($first_name, $last_name, $token, $email, $phone, $institution_id, $user_id);

    $_SESSION['username'] = $email;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['password'] = $password;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['institution_id'] = $institution_id;
    $_SESSION['phone'] = $phone;

    header("Location: ../views/profile.php?message=Successfully Updated");
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