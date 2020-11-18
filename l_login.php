<header>Error usuario no existe <br> <?php require "partials/header.php" ?> </header>

<?php 
    session_start();
    require "database.php";
    $user=$_POST['user'];
    $password=$_POST['password'];
    //here select users of the database
    $sentence = $bd->query("SELECT * FROM users where email='$user';");
    $users = $sentence->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $data) {
             $id=$data->id;
             $type=$data->type;
             $user2=$data->email;
             $password2=$data->password;
             //in this part valid users
             if($user==$user2 && $password==$password2 && $type=='client'){
                $_SESSION['id']=$id;
                header("Location: welcome.php");
             }
             else if($user==$user2 && $password==$password2 && $type=='admin'){
               $_SESSION['id']=$id;
               header("Location: welcomeAdmin.php");
             }
             else{
                header("Location: index.php");
             }

    }

?>
