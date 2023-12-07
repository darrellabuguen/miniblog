<?php
include 'connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$userlen = strlen($username);
$emaillen = strlen($email);
$passlen = strlen($password);

if (isset($_POST['register'])) {
    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($result) === 1) {
        header("Location: signup.php?existed=email is already in used");
    } else if ($username && $email && $password && $repassword != "") {
        if ($repassword != $password) {
            header("Location: signup.php?pwderr=password do not match");
        } else {
            mysqli_query($connection, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password');");
            header("Location: signup.php?state=User created");
        }
    } else {
        header("Location: signup.php?fielderr=please provide proper information");
    }
}
?>