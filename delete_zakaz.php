<?php 
    $mysqli = new mysqli("localhost", "root", "", "19266_system_delivery");

    if (isset($_GET['del'])) {
        $idZakazi = $_GET['del'];

        $query = "DELETE FROM `zakazi` WHERE idZakazi = $idZakazi";
        //echo $query;
        mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
    }

    $query = "SELECT * FROM `zakazi` INNER JOIN `user` on `User_idUser` = `idUser`";
    $result = mysqli_query($mysqli, $query) or die (mysqli_error($mysqli));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

?>