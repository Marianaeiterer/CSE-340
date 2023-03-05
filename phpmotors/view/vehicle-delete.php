<?php 

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
     
    header('location: /phpmotors/'); 
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
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
        <h1><?php if(isset($invInfo['invMake'])){ 
	            echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/phpmotors/vehicles/">
                <ul>
                    <li>
                        <label for="invMake">Make</label>
                        <input name="invMake" id="invMake" type="text" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?> readonly>
                    </li>
                    <li>
                        <label for="invModel">Model</label>
                        <input name="invModel" id="invModel" type="text" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?> readonly>
                    </li>
                    <li>
                        <label for="invDescription">Description</label>
                        <textarea name="invDescription" id="invDescription" readonly><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea>
                    </li>
                    <li>
                        <input type="submit" name="submit" class="btn" value="Delete Vehicle">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="deleteVehicle">
                        <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} ?>" >
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