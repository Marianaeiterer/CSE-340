<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login | PHP Motors</title>
    <link href="/phpmotors/css/style.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        </header>
        <nav>
            <!-- <?php //include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/nav.php" 
                    ?> -->
            <?php echo $navList; ?>
        </nav>
        <main>
            <h1>Sign In</h1>
            <form id="login" method="POST">
                <ul>
                    <li>
                        <label for="clientEmail">Email</label>
                        <input name="clientEmail" id="clientEmail" type="email" required>
                    </li>
                    <li>
                        <label for="clientPassword">Password</label>
                        <input name="clientPassword" id="clientPassword" type="password" required>
                    </li>
                    <li>
                        <button name="loginButton" id="loginButton">Sign-In</button>
                    </li>
                </ul>
            </form>

            <a href="/phpmotors/accounts/?action=registration" class="notMember">Not a member yet? Sign-Up</a>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>