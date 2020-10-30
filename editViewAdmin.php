<?php  
	require 'database.php';
    
    $sentence2 = $bd->query("SELECT * FROM category;");
	$category2 = $sentence2->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<center>
        <h1>Categories</h1>
        <table id="firstText">
            <tr>
                <td>ID</td>
                <td>Name</td>         
                <td>Edit</td>  
                <td>Delete</td>    
            </tr>
            <?php 
                foreach ($category2 as $cat){
            ?>
            <tr>
                <td><?php echo $cat->id; ?></td>
                <td><?php echo $cat->name; ?></td>
                <td><a href="#">EDIT</a></td>
                <td><a href="#">DELETE</a></td>
            </tr>
                <?php } ?>
        </table>
	</center>
</body>
</html>