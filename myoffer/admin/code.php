<?php
include('authentication.php');

if(isset($_POST['user_delete']))
{
    $userId = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$userId'";
    $query_run = mysqli_query($dbcon, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Delete Successfully.";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something is wrong!";
        header("Location: view-register.php");
        exit(0);
    }
}

if(isset($_POST['add_btn']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO users (fname, lname, email, password, role, status) VALUES 
    ('$fname', '$lname', '$email', '$password', '$role', '$status')";
    $query_run = mysqli_query($dbcon, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin/User Added Successfully.";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something is wrong!";
        header("Location: view-register.php");
        exit(0);
    }
}



if(isset($_POST['update_btn']))
{
    $userId = $_POST['userId'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password',
                role='$role', status='$status' WHERE id='$userId'";
    $query_run = mysqli_query($dbcon, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: view-register.php");
        exit(0);
    }
}


?>