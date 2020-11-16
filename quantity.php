<?php  
    session_start();
    $id_client = $_SESSION['id'];
	$code = $_GET['id'];
    include 'database.php';


    $sentence = $bd->prepare("UPDATE car SET quantity=quantity+1 WHERE id_client = ? and id_product = ?;");
    $result = $sentence->execute([$id_client,$code]);

    $sentence2 = $bd->prepare("UPDATE products SET Stock=Stock-1 WHERE id = ?;");
    $result2 = $sentence2->execute([$code]);

    if ($result === TRUE) {
        header('Location: view_car.php');
    }else{
        echo "Error";
    }


	

?>