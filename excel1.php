<?php

$connect = mysqli_connect("localhost", "root", "", "19266_system_delivery");
$output = '';
if(isset($_POST["export_excel"]))
{
    $sql = "SELECT * from zakazi where idZakazi";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0 )
    {
        $output .='
        <table class = "table" bordered = "1">
            <tr>
                <th>idZakazi</th>
                <th>Opisanie</th>
                <th>Otkuda</th>
                <th>Itog_Stoimosti</th>
                <th>Kuda</th>
                <th>User_idUser </th>
            </tr>
        ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
            <tr>
                <td>'.$row["idZakazi"].'</td>
                <td>'.$row["Opisanie"].'</td>
                <td>'.$row["Otkuda"].'</td>
                <td>'.$row["Itog_Stoimosti"].'</td>
                <td>'.$row["Kuda"].'</td>
                <td>'.$row["User_idUser"].'</td>
            </tr>
            ';
        }
        $output.='</table>';
        header("Content-Type:applicatio/xls");
        header("Content-Disposition: attachment; filename = download.xls");
        echo $output;
    }
}
?>