<?php
session_start();

if(isset($_POST['logout_btn']))
{
    //session_destroy();
    unset( $_SESSION['auth']);
    unset( $_SESSION['authRole']);
    unset( $_SESSION['authUser']);

    $_SESSION['message'] = "Logged out Successfully.";
    header("Location: login.php");
    exit(0);
}
?>
