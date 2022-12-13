<?php
include 'config.php';
$query = "DELETE FROM zakazi WHERE idZakazi='" . $_GET["idZakazi"] . "'"; // Delete data from the table customers using id
 if (mysqli_query($link, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }
header ("Location: main.php?msg=".$msg."");
?>