<?php  
    session_start();
    $id_client = $_SESSION['id'];
	$code = $_GET['id'];
    include 'database.php';


    $sentence = $bd->prepare("DELETE FROM car WHERE id_client = ? and id_product = ?;");
    $result = $sentence->execute([$id_client,$code]);

    if ($result === TRUE) {
        header('Location: view_car.php');
    }else{
        echo "Error";
    }


	

?>