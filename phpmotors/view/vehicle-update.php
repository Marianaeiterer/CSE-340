<?php 

if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] < 2) {
     
    header('location: /phpmotors/'); 
}

// Build the select list in the add vehicle page
$classificationList = '<select name="classificationId" id="classificationList">';
$classificationList .= '<option value="0"> Choose a Car Classification </option>';

foreach ($classifications as $classification) {
    $classificationList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] == $classificationId) {
            $classificationList .= ' selected ';
        }
    } elseif(isset($invInfo['classificationId'])){
        if($classification['classificationId'] == $invInfo['classificationId']){
         $classificationList .= ' selected ';
        }
    }
    $classificationList .= "> $classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
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
        <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
                echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
            elseif(isset($invMake) && isset($invModel)) { 
                echo "Modify$invMake $invModel"; }?></h1>

            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form method="post" action="/phpmotors/vehicles/index.php">
                <ul>
                    <li><?php echo $classificationList; ?></li>
                    <li>
                        <label for="invMake">Make</label>
                        <input name="invMake" id="invMake" type="text" <?php if(isset($invMake)){echo "value='$invMake'";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> required>
                    </li>
                    <li>
                        <label for="invModel">Model</label>
                        <input name="invModel" id="invModel" type="text" <?php if(isset($invModel)){echo "value='$invModel'";} elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> required>
                    </li>
                    <li>
                        <label for="invDescription">Description</label>
                        <textarea name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea>
                    </li>
                    <li>
                        <label for="invImage">Image Path</label>
                        <input name="invImage" id="invImage" type="text" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; } ?> required readonly>
                    </li>
                    <li>
                        <label for="invThumbnail">Thumbnail Path</label>
                        <input name="invThumbnail" id="invThumbnail" type="text" value="/phpmotors/images/no-image.png" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; } ?> required readonly>
                    </li>
                    <li>
                        <label for="invPrice">Price</label>
                        <input name="invPrice" id="invPrice" type="number" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; } ?> required>
                    </li>
                    <li>
                        <label for="invStock">Stock</label>
                        <input name="invStock" id="invStock" type="number" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; } ?> required>
                    </li>
                    <li>
                        <label for="invColor">Color</label>
                        <input name="invColor" id="invColor" type="text" <?php if(isset($invColor)){echo "value='$invColor'";} elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; } ?> required>
                    </li>
                    <li>
                        <input type="submit" name="submit" class="btn" value="Update Vehicle">
                        <!-- Add the action name - value pair -->
                        <input type="hidden" name="action" value="updateVehicle">
                        <input type="hidden" name="invId" value="
                        <?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                        elseif(isset($invId)){ echo $invId; } ?>
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