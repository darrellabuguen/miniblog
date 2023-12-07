<?php
session_start();
include 'connect.php';
if (isset($_SESSION['email']) && isset($_SESSION['pass'])) {
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];
    $user = mysqli_query($connection, "SELECT username FROM users WHERE email='$email' AND password='$pass'");
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
                    <li class="flex" style="gap: 1rem;">
                        <p>
                            Hi
                            <?php
                            while ($line = mysqli_fetch_assoc($user)) {
                                $db_user = $line['username'];
                                echo $db_user;
                            }
                            ?>!
                        </p>
                        <a href="./home">Home</a>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container" style="background-color: transparent; box-shadow: none; width: 70%;">
                <div class="gap"></div>
                <p style="font-size: 1.5rem;" class="ptitle"></p>
                <form method="post">
                    <div class="gap"></div>
                    <label for="title" class="labels ltitle">Enter New Title</label><br>
                    <input type="text" name="title" required id="title" onfocus="changeToGreen(this.id)"
                        onblur="changeToGray(this.id)" class="input-form" style="background-color: transparent"><br>
                    <div class="gap"></div>
                    <div class="gap"></div>
                    <label for="content" class="labels lcontent">Enter New Content</label><br>
                    <input type="text" name="content" required id="content" onfocus="changeToGreen(this.id)"
                        onblur="changeToGray(this.id)" class="input-form" style="background-color: transparent"><br>
                    <div class="gap"></div>
                    <input type="submit" name="posst" value="SAVE" class="btn green">
                </form>
                <div class="state" align="center" style="color: green;">
                    <?php
                    if (isset($_GET['updated'])) {
                        echo $_GET['updated'];
                    }
                    ?>
                </div>
            </div>
        </main>

        <?php
        $id = $_GET['post_id'];
        $post = mysqli_query($connection, "SELECT * FROM posts WHERE post_id='$id'");
        while ($data = mysqli_fetch_assoc($post)) {
            $db_title = $data['title'];
            $db_content = $data['content'];

            echo "
            <script>
            document.querySelector('#title').value = '$db_title';
            document.querySelector('.ptitle').textContent = 'Edit Post - $db_title';
            document.querySelector('#content').value = '$db_content';
            </script>
            ";
        }

        if (isset($_POST['posst'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            mysqli_query($connection, "UPDATE posts SET title='$title', content='$content'  WHERE post_id=$id");
            header("Location: edit.php?post_id=$id&updated=post successfully updated");
        }
        ?>
        <script>
            function changeToGreen(id) {
                switch (id) {
                    case "title":
                        document.querySelector(".ltitle").style.color = "#26a69a";
                        break;
                    case "content":
                        document.querySelector(".lcontent").style.color = "#26a69a";
                        break;
                }
            }
            function changeToGray(id) {
                switch (id) {
                    case "title":
                        document.querySelector(".ltitle").style.color = "gray";
                        break;
                    case "content":
                        document.querySelector(".lcontent").style.color = "gray";
                        break;
                }
            }
        </script>
    </body>

    </html>

    <?php
} else {
    header("Location: index.php");
    exit();
}
?>