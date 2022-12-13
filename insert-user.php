<?php
if(count($_POST)>0)
{    
     include 'config.php';
     $idUser = $_POST['idUser'];
     $password = $_POST['password'];
     $username = $_POST['username'];
     $Telegram= $_POST['Telegram'];
     $VK= $_POST['VK'];
     $WatsApp= $_POST['WatsApp'];
 
     $query = "INSERT INTO user (idUser,password,username,Telegram,VK,WatsApp)
     VALUES ('$idUser','$password','$username','$Telegram','$VK','$WatsApp')";
 
     if (mysqli_query($link, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  header ("Location: lk.php ?msg=".$msg."");
?>