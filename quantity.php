<?php  
    session_start();
    $id_client = $_SESSION['id'];
	$code = $_GET['id'];
    include 'database.php';

    //here update quantity where the client buy product
    $sentence = $bd->prepare("UPDATE car SET quantity=quantity+1 WHERE id_client = ? and id_product = ?;");
    $result = $sentence->execute([$id_client,$code]);

    $sentence2 = $bd->prepare("UPDATE products SET Stock=Stock-1 WHERE id = ?;");
    $result2 = $sentence2->execute([$code]);
    //if all is true go view_car.php
    if ($result === TRUE) {
        header('Location: view_car.php');
    }else{
        echo "Error";
    }


	

?>