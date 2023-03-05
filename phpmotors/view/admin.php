<?php

//check if the user is logged in 
if (!isset($_SESSION['loggedin'])) {
    header("Location: http://localhost/phpmotors/index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PHP Motors</title>
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
            <h1><?php echo $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] ?></h1>
            <?php
            if (isset($_SESSION['loggedin'])) {
                echo "<p>You are logged in.</p>";
            }
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>
            <ul>
                <li>First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?> </li>
                <li>Last Name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
                <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
            </ul>

            <h2>Account Management</h2>
            <p>Use this link to update account information</p>
            <a href='http://localhost/phpmotors/accounts/?action=updateAccount'>Update Account Information</a>

            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo "<h2>Inventory Management</h2>" .
                    "<p>Use this link to manage the inventory</p>" .
                    "<a href='http://localhost/phpmotors/vehicles/'>Vehicle Management</a>";
            }
            ?>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>