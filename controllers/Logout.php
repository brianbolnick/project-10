<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];

    destroy_session_and_data();

    header("Location: ../views/index.php");
} else {
    echo "Error -- user not in session";
}

function destroy_session_and_data()
{
    $_SESSION = array();
    setCookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
}
?>