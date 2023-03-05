<?php

//check if the user is logged in 
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header("Location: http://localhost/phpmotors/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management | PHP Motors</title>
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
            <h1>Manage Account</h1>
            <h2>Update Account</h2>

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/phpmotors/accounts/index.php">
                <ul>

                    <li>
                        <label for="clientFirstname">First Name</label>
                        <input type="text" name="clientFirstname" id="clientFirstname" required <?php if (isset($clientFirstname)) {echo "value= $clientFirstname"; }
                                                                                         elseif(isset($_SESSION['clientData'])) {
                                                                                            echo "value=" . $_SESSION['clientData']['clientFirstname'];} ?>>
                    </li>
                    <li>
                        <label for="clientLastname">Last Name</label>
                        <input type="text" name="clientLastname" id="clientLastname" required <?php if (isset($clientLastname)) {echo "value= $clientLastname"; }
                                                                                         elseif(isset($_SESSION['clientData'])) {
                                                                                            echo "value=" . $_SESSION['clientData']['clientLastname'];} ?>>
                    </li>
                    <li>
                        <label for="clientEmail">Email</label>
                        <input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid email address" <?php if (isset($clientEmail)) {echo "value= $clientEmail"; }
                                                                                         elseif(isset($_SESSION['clientData'])) {
                                                                                            echo "value=" . $_SESSION['clientData']['clientEmail'];} ?>>
                    </li>
                    <li>
                        <input type="submit" name="submit" class="btn" value="Update Info">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="updateInfo">
                        <input type="hidden" name="clientId" value="
                        <?php if (isset($_SESSION['clientData'])) {
                            echo $_SESSION['clientData']['clientId'];
                        } elseif (isset($clientId)) {
                            echo $clientId;
                        } ?>
                        ">
                    </li>
                </ul>
            </form>

            <h2>Update Password</h2>
            <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <span>*note your original password will be changed.</span>
            <form method="post" action="/phpmotors/accounts/index.php">
                <ul>
                    <li>
                        <label for="clientPassword">Password</label>
                        <input type="password" name="clientPassword" id="clientPassword" pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                    </li>
                    <li>
                        <input type="submit" name="submit" class="btn" value="Update Password">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="updatePassword">
                        <input type="hidden" name="clientId" value="
                        <?php if (isset($_SESSION['clientData'])) {
                            echo $_SESSION['clientData']['clientId'];
                        } elseif (isset($clientId)) {
                            echo $clientId;
                        } ?>
                        ">
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