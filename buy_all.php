<?php 
    session_start();
    $id_client = $_SESSION['id'];

    include 'database.php';

    $code=random_int(100,100000);
	$sentence = $bd->prepare("INSERT INTO buy(id_client,id_product,quantity,code) SELECT id_client,id_product,quantity,? FROM car
    WHERE id_client = ?;");
    $result = $sentence->execute([$code,$id_client]);

    $sentence1 = $bd->prepare("INSERT INTO purchase(id_client,code,date,total) 
    SELECT id_client,?,NOW(),sum(products.Precio*car.quantity) FROM car
    INNER JOIN products on car.id_product=products.id and car.id_client=?;");
    $result1 = $sentence1->execute([$code,$id_client]);

	if ($result === TRUE) {
		
		header('Location: order.php');

	}else{
		echo "Error";
	}

?>