<?php
session_start();
include 'connect.php';
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $user = mysqli_query($connection, "SELECT username FROM users WHERE email='$email' AND password='$pass'");
    $posts = mysqli_query($connection, "SELECT * FROM posts");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./src/style.css">
        <title>MiniBlog</title>
    </head>

    <body>
        <header>
            <nav>
                <ul class="li-con flex">
                    <li>
                        <h1>MiniBlog</h1>
                    </li>
                    <li class="flex" style="gap: 1rem">
                        <p>
                            Hi
                            <?php
                            while ($line = mysqli_fetch_assoc($user)) {
                                $db_user = $line['username'];
                                echo $db_user;
                            }
                            ?>!
                        </p>
                        <a href="#">Home</a>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div style="width: 50%; margin: auto;">
                <?php
                while ($post_db = mysqli_fetch_assoc($posts)) {
                    $db_id = $post_db['post_id'];
                    $db_title = $post_db['title'];
                    $db_content = $post_db['content'];
                    $db_date = $post_db['timestamp'];
                    $db_date = strtotime($db_date);
                    $date = new DateTime();
                    $ndate = $date->setTimestamp($db_date);
                    $formattedDate = $ndate->format('jS \of F Y h:i:s A');

                    echo "
                        <div class='container'>
                            <div class='content'>
                                <h3>$db_title</h3>
                                <div class='gap'></div>
                                <p>$db_content</p>
                                <p class='flex'>Dates: $formattedDate</p>
                            </div>
                            <div class='option'>
                                <a href='home.php?post_id=$db_id' class='btn red'>DELETE</a>
                                <a href='edit.php?post_id=$db_id' class='btn green-edit'>EDIT</a>
                            </div>
                            <div class='gap'></div>
                        </div>
                    ";
                }

                if (isset($_GET['post_id'])) {
                    $id = $_GET['post_id'];
                    mysqli_query($connection, "DELETE FROM posts WHERE post_id='$id'");
                    header("Location: home.php");
                }
                ?>
            </div>
            <div class="gap"></div>
            <div class="create-con">
                <button class="btn blue" onclick="window.location='./create.php'">CREATE NEW POST</button>
            </div>
        </main>
    </body>

    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>