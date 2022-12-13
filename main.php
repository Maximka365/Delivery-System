<?php
include 'config.php';
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: avtoriz.php");
    exit;

 /*    if (isset($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
    } */
    echo $_SESSION['username'];
}


?>

<!DOCTYPE html>
<html lang="ru">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Title</title>
</head>

<body>
    <div class="popup__bg">
        <form class="popup" action="loads/add_zakazi.php" method="post">
            <img src="img/close.svg" class="close-popup">
            <?php
            /* Создание объявления*/
            $mysqli = new mysqli("localhost", "root", "", "19266_system_delivery");
            $query = "SELECT username, Otkuda, Kuda, Opisanie, Itog_Stoimosti FROM zakazi JOIN user ON idUser =  User_idUser";
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            $result = '';


            ?>
            <label class="style_label">Ваше id</label>
            <input class="input_login" type="text" name="User_idUser" placeholder="Ваше id" required id="User_idUser" value="<?php echo "" . $_SESSION["id"]; ?>" readonly>

            <label class="style_label">Откуда</label>
            <input class="input_login" type="text" name="Otkuda" placeholder="Введите название города" required>

            <label class="style_label">Куда</label>
            <input class="input_login" type="text" name="Kuda" placeholder="Введите название города" required>

            <label class="style_label">Стоимость</label>
            <input class="input_login" type="text" name="Itog_Stoimosti" placeholder="Введите стоимость" required>


            <label class="style_label">Описание</label>
            <!-- <textarea type="text" name="Opisanie"required></textarea> -->
            <input class="input_login" type="text" name="Opisanie" placeholder="Описание" required>

            <button class="button_login" type="submit" name="formSubmit">Создать заказ</button>
        </form>
    </div>
    <!-- <form action="loads/add_url.php" method="post">

    </form> -->

    <header class="header">
        <div class="container-header">
            <h1>
                <a style="color:#fff; " href="main.html">System Delivery</a>
            </h1>
            <form class="search-form">
                <input class="input-search" type="search" name="search" placeholder="Напишите, что нибудь!!">
                <input class="btn" type="submit" name="submit" value="найти">
            </form>
            <?php
            $mysqli = new mysqli("localhost", "root", "", "19266_system_delivery");
            if (isset($_POST['submit'])) {
                $search = explode(" ", $_POST['search']);
                $count = count($search);
                $array = array();
                $i = 0;
                foreach ($search as $key) {
                    $i++;
                    if ($i < $count) $array[] = "CONCAT (`Opisanie`, `Kuda`) like '%" . $key . "%' or";
                    else $array[] = "CONCAT (`Opisanie`, `Kuda`) like '%" . $key . "%' ";
                }
                $sql = "SELECT * from `zakazi` where" . implode("", $array);
                echo $sql;
                $query = mysqli_query($link, $sql);
                while ($row = mysqli_fetch_assoc($query)) echo "<h1>" . $row['Opisanie'] . "</h1> <p>" . $row['Kuda'] . "</p> <br>";
            }
            ?>

            <a href="lk.php" class="lk">Личный кабинет</a>
        </div>
    </header>

    <div class="under-header">
        <a href="#" style="margin-left: 20px;" class="btn open-popup" type="submit">Создать</a>
        <a href="#" class="btn" type="submit">Фильтрация</a>
        <a href="#" width="15px" class="btn" type="submit">
            <img src="img/sort.svg" width="17px" alt="sort">
        </a>


        <form action="excel1.php" method="post">
            <input class="btn" style="margin-left: 10px;" type="submit" id="export_excel" name="export_excel" value="Экспорт">

        </form>
    </div>

    <form action="loads/add_zakazi.php" method="post">
        <div class="zakazy">

            <?php

            /* Создание объявления*/
            $mysqli = new mysqli("localhost", "root", "", "19266_system_delivery");
            $query = "SELECT username, Telegram, VK, WatsApp, Otkuda, Kuda, Opisanie, Itog_Stoimosti FROM zakazi JOIN user ON idUser =  User_idUser";
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            $result = '';


            foreach ($data as $elem) : ?>
                <div class="zakaz">
                    <div class="ava-fio-time">
                        <img class="ava" src="img/avatars/user.png" width="70px" alt="ava">
                        <div class="fio-time">
                            <p id="namePerson"><?php echo $elem['username']; ?></p>

                            <p style="margin-bottom: 5px ;"><?php echo $elem['Otkuda']; ?> - <?php echo $elem['Kuda']; ?></p>

                        </div>
                    </div>
                    <div class="prosba-content">
                        <p><?php echo $elem['Opisanie']; ?></p>

                    </div>
                    <div class="oplata-conect-btn">
                        <div class="oplata">
                            <p id="cost">Оплата:<?php echo $elem['Itog_Stoimosti']; ?></p>
                            <p id="nal-card">Нал</p>
                        </div>


                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Связаться
                            </button>
                            <ul class="dropdown-menu text-muted">
                                <li style="margin: 5%">
                                <label class="style_label">Telegram:</label>
                                    <p><?php echo $elem['Telegram']; ?></p>
                                </li>
                                <li style="margin: 5%">
                                <label class="style_label">WatsApp:</label>
                                    <p><?php echo $elem['WatsApp']; ?></p>
                                </li>
                                <li style="margin: 5%">
                                <label class="style_label">VK:</label>
                                    <p><?php echo $elem['VK']; ?></p>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    </form>
    <footer class="footer">
        <a href="logout.php" type="submit" class="btn" id="pbtn">Выйти из аккаунта</a>
    </footer>
    <script src="js/fly-window.js"></script>

</body>

</html>