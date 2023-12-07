<?php
include 'connect.php';
if (isset($_POST['posst'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($title && $content != "") {
        mysqli_query($connection, "INSERT INTO posts(title,content) VALUES('$title','$content');");
        header("Location: create.php?success=post added");
    } else {
        echo "Kindly put all the information needed";
    }
}
?>