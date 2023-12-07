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
                <li><a href="./index.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p align="center" style="padding: 1rem; font-size: 1.5rem;">Registration</p>
        <div class="container" style="width: 70%">
            <p class="upper">See the Registration Rules</p>
            <form action="register.php" method="post" class="login">
                <input type="text" name="username" required placeholder="Enter Username" class="input-form"><br>
                <input type="email" name="email" required placeholder="Enter Email" class="input-form"><br>
                <input type="password" name="password" required placeholder="Enter Password" class="input-form"><br>
                <input type="password" name="repassword" required placeholder="Confirm Password" class="input-form"><br>
                <div class="gap"></div>
                <div class="btn-con">
                    <input type="submit" name="register" value="REGISTER" class="btn green">
                </div>
                <div class="gap"></div>
                <p>Return to the <a href="./index.php" class="orange">LOGIN PAGE</a></p>
                <p class="err" align="center">
                    <?php
                    if (isset($_GET['pwderr'])) {
                        echo $_GET['pwderr'];
                    } elseif (isset($_GET['fielderr'])) {
                        echo $_GET['fielderr'];
                    } elseif (isset($_GET['state'])) {
                        echo $_GET['state'];
                    } elseif (isset($_GET['existed'])) {
                        echo $_GET['existed'];
                    }
                    ?>
                </p>
            </form>
        </div>
    </main>
</body>

</html>