<?php 
	
	if (!isset($_POST['oculto'])) {
		header('Location: editViewProducts.php');
	}

	include 'database.php';
	$id2 = $_POST['id2'];
	$name = $_POST['txt2name'];
    $SKU = $_POST['txt2SKU'];
    $description = $_POST['txt2description'];
    $stock = $_POST['txt2stock'];
    $price = $_POST['txt2price'];
    $foto=$_FILES["txt2image"]["name"];
    $destino="assets/img/".$foto;

	$sentence = $bd->prepare("UPDATE products SET name = ?, SKU=?, description=?, Stock=?, Precio=?, image=? WHERE id = ?;");
	$result = $sentence->execute([$name,$SKU,$description,$stock,$price,$destino,$id2]);

	if ($result === TRUE) {
		header('Location: editViewProducts.php');
	}else{
		echo "Error";
	}
?>