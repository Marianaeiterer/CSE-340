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
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form id="login" method="POST">
                <ul>
                    <li>
                        <label for="clientEmail">Email</label>
                        <input type="email" name="clientEmail" id="clientEmail" <?php if (isset($clientEmail)) {echo "value='$clientEmail'";} ?> required>
                    </li>
                    <li>
                        <label for="clientPassword">Password</label>
                        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                        <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                    </li>
                    <li>
                        <input type="submit" name="submit" id="regbtn" class="btn" value="Login">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="Login">
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