<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | PHP Motors</title>
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
            <h1>Add Vehicle</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <p>*Note all fields are required</p>

            <form method="post" action="/phpmotors/vehicles/index.php">
                <ul>
                    <li><?php echo $classificationList; ?></li>
                    <li>
                        <label for="invMake">Make</label>
                        <input name="invMake" id="invMake" type="text">
                    </li>
                    <li>
                        <label for="invModel">Model</label>
                        <input name="invModel" id="invModel" type="text">
                    </li>
                    <li>
                        <label for="invDescription">Description</label>
                        <textarea name="invDescription" id="invDescription"></textarea>
                    </li>
                    <li>
                        <label for="invImage">Image Path</label>
                        <input name="invImage" id="invImage" type="text" value="/phpmotors/images/no-image.png" readonly>
                    </li>
                    <li>
                        <label for="invThumbnail">Thumbnail Path</label>
                        <input name="invThumbnail" id="invThumbnail" type="text" value="/phpmotors/images/no-image.png" readonly>
                    </li>
                    <li>
                        <label for="invPrice">Price</label>
                        <input name="invPrice" id="invPrice" type="number">
                    </li>
                    <li>
                        <label for="invStock">Stock</label>
                        <input name="invStock" id="invStock" type="number">
                    </li>
                    <li>
                        <label for="invColor">Color</label>
                        <input name="invColor" id="invColor" type="text">
                    </li>
                    <li>
                        <input type="submit" name="submit" id="vehbtn" class="btn" value="Add Vehicle">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="addVehicle">
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