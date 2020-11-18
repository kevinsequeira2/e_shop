<?php  
session_start();
$id_client = $_SESSION['id'];
include 'database.php';

//Here drop car where id of client is similar of id_client of product
$sentence = $bd->prepare("DELETE FROM car WHERE id_client = ?;");
$result = $sentence->execute([$id_client]);

if ($result === TRUE) {
    header('Location: view_car.php');
}else{
    echo "Error";
}




?>

