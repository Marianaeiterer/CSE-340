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
            <form id="registration" method="POST" action="submit">
                <ul>
                    <li>
                        <label for="clientFirstname">First Name</label>
                        <input name="clientFirstname" id="clientFirstname" type="text" required>
                    </li>
                    <li>
                        <label for="clientLastname">Last Name</label>
                        <input name="clientLastname" id="clientLastname" type="text" required>
                    </li>
                    <li>
                        <label for="clientEmail">Email</label>
                        <input name="clientEmail" id="clientEmail" type="email" required>
                    </li>
                    <li>
                        
                        <label for="clientPassword">Password</label>
                        <p>Passwords must be at least 8 characteres and contain at least 1 number, 1 capital letter, and 1 special character</p>
                        <input name="clientPassword" id="clientPassword" type="password" required>
                        <button class="show-password">Show Password</button>
                    </li>
                    <li>
                        <button name="registrationButton" id="registratioButton">Register</button>
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