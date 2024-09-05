<?php
include("auth.php");
require("db.php");


$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];


if ($new_password !== $confirm_password) {
    echo "<script>alert('Error: New password and confirm password do not match.'); window.location='index.php';</script>";
    exit();
}


$username = $_SESSION['username'];
$query = "SELECT password FROM user WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $stored_password = $row['password'];

    if ($current_password === $stored_password) {
        
        $update_query = "UPDATE user SET password = '$new_password' WHERE username = '$username'";
        $update_result = mysqli_query($connection, $update_query);

        if ($update_result) {
            echo "<script>alert('Password changed successfully!'); window.location='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error updating password. Please try again.'); window.location='index.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Current password is incorrect.'); window.location='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Error fetching user data. Please try again.'); window.location='index.php';</script>";
    exit();
}

mysqli_close($connection);
?>
