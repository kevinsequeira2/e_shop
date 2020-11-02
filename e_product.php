<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: editViewProducts.php');
	}
	
	include 'database.php';
	$id = $_GET['id'];

	$sentence = $bd->prepare("SELECT * FROM products WHERE id = ?;");
	$sentence->execute([$id]);
	$product = $sentence->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Category</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<center>
		<h3 id="firstText">Edit product:</h3>
		<form method="POST" enctype="multipart/form-data" action="e_productProcess.php">
			<table id="firstText">
				<tr>
					<td>id: </td>
					<td><input type="text" name="txt2Id" value="<?php echo $product->id; ?>"></td>
				</tr>
				<tr>
					<td>Name: </td>
					<td><input type="text" name="txt2name" value="<?php echo $product->name; ?>"></td>
				</tr>
                <tr>
					<td>SKU: </td>
					<td><input type="number" name="txt2sku" value="<?php echo $product->SKU; ?>"></td>
				</tr>
                <tr>
					<td>Description: </td>
					<td><input type="text" name="txt2description" value="<?php echo $product->description; ?>"></td>
				</tr>
                <tr>
					<td>Stock: </td>
					<td><input type="number" name="txt2stock" value="<?php echo $product->Stock; ?>"></td>
				</tr>
                <tr>
					<td>Price: </td>
					<td><input type="number" name="txt2price" value="<?php echo $product->Precio; ?>"></td>
				</tr>
                <tr>
					<td>Image: </td>
					<td><input type="file" name="txt2image" value="<?php echo $product->image; ?>">
                        <img src="<?php echo $product->image; ?>" width="50px" height="50px">
                    </td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $product->id; ?>">
					<td colspan="2"><input type="submit" value="EDIT PRODUCT"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>