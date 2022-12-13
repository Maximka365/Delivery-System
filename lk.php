<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: avtoriz.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Title</title>
</head>

<body style="overflow-y: hidden">
    <div class="popup__bg"> 
        <form class="popup" action="insert-user.php" method="post">
            <img src="img/close.svg" class="close-popup">
            <label>
                <input type="text" name="Telegram" class="form-control" required="">
                <div class="label__text">
                    Введите ссылку на сво социальную сеть
                </div>
            </label>
            <button type="submit">Сохранить</button>
        </form>
    </div> 
    <header class="header">
        <div class="container-header">
            <h1>
                <a style="color:#fff; "href="main.php">System Delivery</a>
            </h1>
                <form class="search-form">
                    <input class="input-search" type="search" name="q" placeholder="Напишите, что нибудь!!"> 
                    <a href="#"class="btn" type="submit">Найти</a>
                </form>
            <a href="#" class="lk">Личный кабинет</a>
        </div>
    </header>
    <div class="content-lk">
        <div class="ava-fio-lk">
            <img class="ava-lk" src="img/avatars/user.png" width="70px" alt="ava">
            
            <div class="fio-lk" id="namePerson">
            <?php
            if (isset($_POST['avtoriz'])) {
                $username_true = mysqli_query($connections, "SELECT * FROM `user` WHERE username='".$_POST['username']."' AND password = MD5('".$_POST['password']."')");
                if ($username_true) {
                    $user = mysql_fetch_assoc($username_true);
                    $_SESSION['username_true'] = $username_true;
                    $_SESSION['username'] = $username['username']; //или где там имя храниться
                } else echo "Не правильно";
                }	
                echo "".$_SESSION["username"];
            ?>
            </div>  
        </div>
        
           
        <?php
            include 'config.php';
            $query = "SELECT * FROM user WHERE username='".$_SESSION['username']."'";// Fetch all the data from the table customers
            $result=mysqli_query($link,$query);
            ?>
            <?php if ($result->num_rows > 0): ?>
                <?php while($array=mysqli_fetch_row($result)): ?>
                <div class = "btn_flex">
                    <tr>
                        <a href="edit.php?idUser=<?php echo $array[0];?>" class="btn btn-primary">Изменить данные</a>
                    </tr>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="">No Data Found</td>
                </tr>
            <?php endif; ?>
            <?php mysqli_free_result($result); ?>      
  </div>
  <footer class="footer">
        <a href="logout.php" type="submit" class="btn" id="pbtn">Выйти из аккаунта</a>
    </footer>
  <script src="js/fly-window.js"></script>
</body>
</html>