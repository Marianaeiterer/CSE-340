<div id="top-header">
    <img src="/phpmotors/images/site/logo.png" alt="PHP Motors logo">
    <div>
    <?php 
    /*
    if (isset($cookieFirstname)) {
        echo "<span>Welcome $cookieFirstname!</span>";
    }
    */
     if (isset($_SESSION['loggedin'])) {
        echo "<a href='/phpmotors/accounts/'>" . $_SESSION['clientData']['clientFirstname'] . " | </a>" ;
    }else{
        echo "";
    }
    
     if(isset($_SESSION['loggedin'])){
        echo "<a href='/phpmotors/accounts/?action=Logout'>Logout</a>";
     }else{
        echo "<a href='/phpmotors/accounts/?action=login'>My Account</a>";
     }
        
    ?>
    </div>
</div> 