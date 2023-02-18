<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration | PHP Motors</title>
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
            <h1>Register</h1>
            <p>All fields are required</p>

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

            <form method="post" action="/phpmotors/accounts/index.php">
                <ul>
                    <li>
                        <label for="clientFirstname">First Name</label>
                        <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required>
                    </li>
                    <li>
                        <label for="clientLastname">Last Name</label>
                        <input type="text" name="clientLastname" id="clientLastname" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required>
                    </li>
                    <li>
                        <label for="clientEmail">Email</label>
                        <input type="email" name="clientEmail" id="clientEmail" placeholder="Enter a valid email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> required>
                    </li>
                    <li>
                        <label for="clientPassword">Password:</label>
                        <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                        <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                        <button class="show-password">Show Password</button>
                    </li>
                    <li>
                        <input type="submit" name="submit" id="regbtn" class="btn" value="Register">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="register">
                    </li>
                </ul>
            </form>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>