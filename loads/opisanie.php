<?php 


include ("../config.php"); 
 
 $Opisanie = $_POST['Opisanie'];
 $Otkuda = $_POST['Otkuda'];
 $Itog_Stoimosti = $_POST['Itog_Stoimosti'];
 $Kuda = $_POST['Kuda'];
 $username = $_POST['User_idUser'];


 mysqli_query($link, "INSERT INTO `zakazi` (`idZakazi`, `Opisanie`, `Otkuda`, `Itog_Stoimosti`, `Kuda`, `User_idUser`) VALUES (NULL, '$Opisanie', '$Otkuda', '$Itog_Stoimosti', '$Kuda', '$username')");

 header('Location: ../main.php');


 ?>