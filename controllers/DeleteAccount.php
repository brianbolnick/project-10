<?php

require_once '../models/model.php';
session_start();

$user_id = $_SESSION['user_id'];

$obj = new UsersModel();
$obj->delete("user_id = $user_id");

//logout user 
destroy_session_and_data();
header("Location: ../views/index.php?message=Your account has been deleted.");
exit();

function destroy_session_and_data()
{
    $_SESSION = array();
    setCookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}


?>