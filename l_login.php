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
             if($user==$user2 && $password==$password2){
                $_SESSION['$id'];
                header("Location: index.php");
             }
             else{
                 echo "user incorrect";
             }

    }

?>
