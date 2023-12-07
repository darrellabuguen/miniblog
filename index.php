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
                    <p class="logo">MiniBlog</p>
                </li>
                <li><a href="./index.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container" style="width:70%">
            <p class="upper">Login</p>
            <form action="login.php" method="post" class="login">
                <input type="email" name="email" required placeholder="Enter Email" class="input-form"><br>
                <input type="password" name="password" required placeholder="Enter Password" class="input-form">
                <div class="gap"></div>
                <div class="btn-con">
                    <input type="submit" name="login" value="LOGIN" class="btn green">
                    <input type="button" value="REGISTER" class="btn green" onclick="window.location='./signup.php'">
                </div>
                <div class="gap"></div>
                <p>Currently logged out.</p>
                <p class="err" align="center" style="color: red;">
                    <?php
                    if (isset($_GET['login_error'])) {
                        echo $_GET['login_error'];
                    }
                    ?>
                </p>
            </form>
        </div>
    </main>
</body>

</html>