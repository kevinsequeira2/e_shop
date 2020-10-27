<header>Error usuario no existe <br> <?php require "partials/header.php" ?> </header>

<?php 
    session_start();
    require "database.php";
    $user=$_POST['user'];
    $password=$_POST['password'];
    $sentence = $bd->query("SELECT id,user,password FROM users where user='$user';");
    $users = $sentence->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $data) {
             $id=$data->id;
             $user2=$data->user;
             $password2=$data->password;
             if($user==$user2 && $password==$password2 && $id!=1){
                $_SESSION['id']=$id;
                header("Location: welcome.php");
             }
             else if($user==$user2 && $password==$password2 && $id==1){
               $_SESSION['id']=$id;
               header("Location: welcomeAdmin.php");
             }
             else{
                header("Location: index.php");
             }

    }

?>
