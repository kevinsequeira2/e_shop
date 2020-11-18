<?php  

    //In this part is get id of client and product
    session_start();
    $id_client = $_SESSION['id'];
	$code = $_GET['id'];
    include 'database.php';

    //if product is buy is delete in car of client
    $sentence = $bd->prepare("DELETE FROM car WHERE id_client = ? and id_product = ?;");
    $result = $sentence->execute([$id_client,$code]);
    //if ejecution is correctly go view_car.php
    if ($result === TRUE) {
        header('Location: view_car.php');
    }else{
        echo "Error";
    }


	

?>