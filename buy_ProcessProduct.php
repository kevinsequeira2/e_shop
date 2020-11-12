<?php 

    include 'database.php';
    session_start();
    $id_client = $_SESSION['id'];
	$id2 = $_POST['id2'];
    $quality = $_POST['txt2quality'];
    $date = date('Y-m-d H:i:s');

	$sentence = $bd->prepare("INSERT INTO buy (id_client,id_product,date,quantity) VALUES (?,?,?,?) ;");
    $result = $sentence->execute([$id_client,$id2,$date,$quality]);

    $sentence2 = $bd->query("SELECT * FROM products where id = $id2;");
    $result2 = $sentence2->fetchAll(PDO::FETCH_OBJ);;

    foreach ($result2 as $data) {
        $stock=$data->Stock;
    }
    $total=$stock-$quality;
    $sentence3 = $bd->prepare("UPDATE products SET Stock = ? WHERE id = ? ;");
    $result3 = $sentence3->execute([$total,$id2]);
    
    $sentence4 = $bd->prepare("DELETE FROM car WHERE id_client = ? and id_product = ? ;");
	$result4 = $sentence4->execute([$id_client,$id2]);

	if ($result === TRUE) {
		header('Location: view_car.php');
	}else{
        echo "Error";
	}
?>