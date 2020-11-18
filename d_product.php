<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$code = $_GET['id'];
    include 'database.php';

    //Here delete products where get id is similar at id of product
    $sentence = $bd->prepare("DELETE FROM products WHERE id = ?;");
    $result = $sentence->execute([$code]);

    if ($result === TRUE) {
        header('Location: editViewProducts.php');
    }else{
        echo "Error";
    }


	

?>