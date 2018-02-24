<?php
if (isset($_POST['email'])) {
    require_once '../models/model.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $institution_id = $_POST['institution_id'];

    // handle password hashing
    $salt1 = 'nlaosd73@#YHS)#@Jsafilj39';
    $salt2 = 'FASDa9spd^&SD)QMAOS#a02jaoj1amsnq@';
    $password = $_POST['password'];
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

    //forward to view page
    header("Location: ../views/index.php");
    exit();
}
