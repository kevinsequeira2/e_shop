<?php  
	//init session for get id
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: view_car.php');
	}
	
	include 'database.php';
	$id = $_GET['id'];
	//here select products to show products in the visual part
	$sentence = $bd->prepare("SELECT * FROM products WHERE id = ?;");
	$sentence->execute([$id]);
	$products = $sentence->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Buy</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<center>
		<h3 id="firstText">Buy:</h3>
		<!--in this part is send all data of produts-->
		<form method="POST" action="buy_ProcessProduct.php">
			<table id="firstText">
				<tr>
					<td>id: </td>
					<td><input type="text" name="txt2Id" value="<?php echo $products->id; ?>"></td>
				</tr>
				<tr>
					<td>name: </td>
					<td><input type="text" name="txt2name" value="<?php echo $products->name; ?>"></td>
				</tr>
                <tr>
					<td>Quality: </td>
					<td><input type="number" name="txt2quality" placeholder="insert quality"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $products->id; ?>">
					<td colspan="2"><button type="submit">Confirm</button></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>