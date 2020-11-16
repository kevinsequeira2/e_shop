<?php  
session_start();
$id_client = $_SESSION['id'];
include 'database.php';


$sentence = $bd->prepare("DELETE FROM car WHERE id_client = ?;");
$result = $sentence->execute([$id_client]);

if ($result === TRUE) {
    header('Location: view_car.php');
}else{
    echo "Error";
}




?>

