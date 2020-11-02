<?php  
	if (!isset($_POST['oculto'])) {
		exit();
	}

	include 'database.php';
    $name = $_POST['txtname'];
    $SKU = $_POST['txtSKU'];
    $description = $_POST['txtdescription'];
    $stock = $_POST['txtstock'];
    $price = $_POST['txtprice'];
    $id_category=$_POST['id_category'];
    $foto=$_FILES["txtimage"]["name"];
    $destino="assets/img/".$foto;
    

	$sentence = $bd->prepare("INSERT INTO products(name,SKU,description,Stock,Precio,image,id_category) VALUES (?,?,?,?,?,?,?);");
	$result = $sentence->execute([$name,$SKU,$description,$stock,$price,$destino,$id_category]);

	if ($result === TRUE) {
		
		header('Location: editViewProducts.php');

	}else{
        echo "Error";
	}
?>