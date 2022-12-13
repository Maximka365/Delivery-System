<?php
if(count($_POST)>0){
include 'config.php';
$query = "UPDATE User set idUser='" . $_POST['idUser'] . "', password='" . $_POST['password'] . "', username='" . $_POST['username'] . "', Telegram='" . $_POST['Telegram'] . "', VK='" . $_POST['VK'] . "', WatsApp='" . $_POST['WatsApp'] . "' WHERE idUser='" . $_POST['idUser'] . "'"; // update form data from the database
 if (mysqli_query($link, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location:  lk.php?msg=".$msg."");
?>