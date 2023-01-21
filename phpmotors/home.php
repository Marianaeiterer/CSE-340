<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PHP Motors</title>
    <link href="/phpmotors/css/stylehome.css" type="text/css" rel="stylesheet" media="screen">
</head>

<body>
    <div id="wrapper">

        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/header.php" ?>
        </header>
        <nav>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/nav.php" ?>
        </nav>
        <main>
            <!-- Main content -->
            <h1>Welcome to PHP Motors!</h1>
            <div class="container">
                <div class="text">
                    <h2>DMC Delorean</h2>
                    <p>3 Cup holders</p>
                    <p>Superman doors</p>
                    <p>Fuzzy dice!</p>
                </div>
                <div class="image">
                    <img src="images/delorean.jpg" alt=" Delorean car">
                </div>

                <div class="button">
                    <button type="button"><img src="images/site/own_today.png" alt="Own Today"></button>
                </div>
            </div>
            <div class="car-information">
                <div class="car-reviews">
                    <h2>DMC Delorean Reviews</h2>
                    <ul>
                        <li>"So fast its almost like traveling in time." (4/5)</li>
                        <li>"Coolest ride on the road." (4/5)</li>
                        <li>"I'm feeling Marty McFly!" (5/5)</li>
                        <li>"The most futuristic ride of our day." (4.5/5)</li>
                        <li>"80's livin and I love it!" (5/5)</li>
                    </ul>
                </div>

                <div class="car-upgrades">
                    <h2>Delorean Upgrades</h2>
                    <div class="img-container">
                        <div class="cell">
                            <img src="images/upgrades/flux-cap.png" alt="Flux Capacitor">
                            <p><a href="/phpmotors/home.php">Flux Capacitor</a></p>
                        </div>
                        <div class="cell">
                            <img src="images/upgrades/flame.jpg" alt="Flame Decals">
                            <p><a href="/phpmotors/home.php">Flame Decals</a></p>
                        </div>
                        <div class="cell">
                            <img src="images/upgrades/bumper_sticker.jpg" alt="Bumper Stickers">
                            <p><a href="/phpmotors/home.php">Bumper Stickers</a></p>
                        </div>
                        <div class="cell">
                            <img src="images/upgrades/hub-cap.jpg" alt="Hub Caps">
                            <p><a href="/phpmotors/home.php">Hub Caps</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <hr>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/common/footer.php" ?>
        </footer>
    </div>
</body>

</html>