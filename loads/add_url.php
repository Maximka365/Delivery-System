<?php 

    

include ("../config.php"); 
 
 $username = $_POST['username'];
 $password = $_POST['password'];
 $Telegram = $_POST['Telegram'];
 $VK = $_POST['VK'];
 $WatsApp = $_POST['WatsApp'];
 
 

 mysqli_query($link, "INSERT INTO `user` (`idUser`, `username`, `password`, `Telegram`, `VK`, `WatsApp`) VALUES (NULL,  `$username`, `$password`, `$Telegram`, `$VK`, `$WatsApp`)");
 header('Location: ../avtoriz.php');




 
 ?>