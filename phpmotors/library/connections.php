<?php

/*Proxy connection to the phpmotors database*/ 

function phpmotorsConnect(){
 $server = 'localhost';
 $dbname= 'phpmotors.';
 $username = 'iClient';
 $password = '3OBfrF@[8m[/26jG'; 
 $dsn = "mysql:host=$server;dbname=$dbname";
 $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

 // Create the actual connection object and assign it to a variable
 try {
  $link = new PDO($dsn, $username, $password, $options);
  //if(is_object($link)){
    //echo 'It worked!';
  //}
  return $link;
 } catch(PDOException $e) {
  header('Location: /phpmotors/view/500.php');
  exit;
 }
}

phpmotorsConnect();

?>