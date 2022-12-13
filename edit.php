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
    <title>Edit and Update Data PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
  <div class="page-header">
      <h2>Изменение строки</h2>
  </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            include 'config.php';
            $query = "SELECT * FROM User WHERE idUser='" . $_GET["idUser"] . "'"; // Fetch data from the table customers using id
            $result=mysqli_query($link,$query);
            $link = mysqli_fetch_assoc($result);
            ?>
            <form action="update_user.php" method="POST">
              <input type="hidden" name="idUser" value="<?php echo $_GET["idUser"]; ?>" class="form-control" required="">
              <div class="form-group">
                <label for="exampleInputEmail1">Логин</label>
                <input type="text" name="username" class="form-control" value="<?php echo $link['username']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Пароль</label>
                <input type="password" name="password" class="form-control" value="<?php echo $link['password']; ?>" required="">
              </div>              
              <div class="form-group">
                <label for="exampleInputEmail1">Телеграм</label>
                <input type="text" name="Telegram" class="form-control" value="<?php echo $link['Telegram']; ?>" required="">
              </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">ВК</label>
                    <input type="text" name="VK" class="form-control" value="<?php echo $link['VK']; ?>" required="">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">WatsApp</label>
                <input type="text" name="WatsApp" class="form-control" value="<?php echo $link['WatsApp']; ?>" required="">
              </div>
                
                <button type="submit" class="btn btn-primary" value="submit">Изменить</button>
            </form>
        </div>
    </div>        
</div>
</body>
</html>