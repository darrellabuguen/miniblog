<?php
session_start();
include 'connect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($connection, "SELECT * FROM users WHERE email='$email' AND password='$pass'");

    if (mysqli_num_rows($result) === 1) {
        $line = mysqli_fetch_assoc($result);
        if ($line['email'] === $email && $line['password'] === $pass) {
            $_SESSION['email'] = $line['email'];
            $_SESSION['pass'] = $line['password'];
            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?login_error=Incorrect username or password");
        }
    } else {
        header("Location: index.php?login_error=Incorrect username or password");
    }
}
?>
</table>