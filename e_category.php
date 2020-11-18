<?php  
	session_start();
	if (!isset($_GET['id'])) {
		header('Location: editViewAdmin.php');
	}
	
	include 'database.php';
	$id = $_GET['id'];
	//In this part select category in the database for show category in the visual part
	$sentence = $bd->prepare("SELECT * FROM category WHERE id = ?;");
	$sentence->execute([$id]);
	$category = $sentence->fetch(PDO::FETCH_OBJ);
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
		<!--With this form you can edit category-->
		<h3 id="firstText">Edit category:</h3>
		<form method="POST" action="e_categoryProcess.php">
			<table id="firstText">
				<tr>
					<td>id: </td>
					<td><input type="text" name="txt2Id" value="<?php echo $category->id; ?>"></td>
				</tr>
				<tr>
					<td>category: </td>
					<td><input type="text" name="txt2name" value="<?php echo $category->name; ?>"></td>
				</tr>
				<tr>
					<input type="hidden" name="oculto">
					<input type="hidden" name="id2" value="<?php echo $category->id; ?>">
					<td colspan="2"><input type="submit" value="EDIT CATEGORY"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>