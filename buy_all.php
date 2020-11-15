<?php 
    session_start();
    $id_client = $_SESSION['id'];

    include 'database.php';


	$sentence = $bd->prepare("INSERT INTO buy(id_client,id_product) SELECT id_client,id_product FROM car
    WHERE id_client = ?;");
    $result = $sentence->execute([$id_client]);

    $sentence2 = $bd->prepare("UPDATE products INNER JOIN car on car.id_product=products.id 
    SET products.Stock = products.Stock-1 
    WHERE car.id_client = ?;");
    $result2 = $sentence2->execute([$id_client]);
    
    $sentence3 = $bd->prepare("DELETE FROM car where id_client = ?;");
    $result3 = $sentence3->execute([$id_client]);


	if ($result === TRUE) {
		
		header('Location: order.php');

	}else{
		echo "Error";
	}

?>