<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Classification | PHP Motors</title>
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
            <h1>Add Car Classification</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method='post' action="/phpmotors/vehicles/index.php">
                <ul>
                    <li>
                        <label for="classificationName">Classification Name</label>
                        <input type="text" name="classificationName" id="classificationName">
                    </li>

                    <li>
                        <input type="submit" name="submit" id="classbtn" class="btnclass" value="Add Classification">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="addClass">
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