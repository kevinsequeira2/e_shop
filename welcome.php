<?php 
    session_start();
    require "database.php";
    if(isset($_SESSION['id'])){
        $sentence = $bd->query("SELECT id,user,password FROM users where id='$_SESSION[id]';");
        $users = $sentence->fetchAll(PDO::FETCH_OBJ);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>welcome</title>
</head>
<body>
    <h5 id="firstText"><?php require "partials/header.php"; ?></h5>
    <h1 id="firstText">Welcome to E-SHOP</h1>
    <?php
    foreach ($users as $data) {

        ?>  
        <h2 id="firstText"><?php echo $data->user; ?></h2>  
        <?php
        }
        ?>

</body>
</html>