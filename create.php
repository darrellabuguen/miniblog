<?php
session_start();
include 'connect.php';
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
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
                    <li class="flex">
                        <a href="./home.php">Home</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container" style="background-color: transparent; box-shadow: none; width: 70%;">
                <div class="gap"></div>
                <p style="font-size: 1.5rem;">Create a Post!</p>
                <div class="gap"></div>
                <form action="creates.php" method="post">
                    <input type="text" name="title" required placeholder="Enter Title" class="input-form"
                        style="background-color: transparent"><br>
                    <input type="text" name="content" required placeholder="Enter Content" class="input-form"
                        style="background-color: transparent; padding-bottom: 3rem;"><br>
                    <div class="gap"></div>
                    <input type="submit" name="posst" value="POST" class="btn green">
                </form>
                <p align="center" style="color: green">
                    <?php
                    if (isset($_GET['success'])) {
                        echo $_GET['success'];
                    }
                    ?>
                </p>
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