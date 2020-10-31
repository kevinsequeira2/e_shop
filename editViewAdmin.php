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
                <td><a href="e_category.php?id=<?php echo $cat->id; ?>">EDIT</a></td>
                <td><a href="d_category.php?id=<?php echo $cat->id; ?>">DELETE</a></td>
            </tr>
                <?php } ?>
        </table>
        <br>
        <button id="firstText"><b><a href="welcomeAdmin.php">Ready</a></b></button>
    </center>
    <center>
        <h3>Insert category:</h3>
            <form method="POST" action="i_category.php">
                <table id="firstText">
                    <tr>
                        <td>Category: </td>
                        <td><input type="text" name="txtname"></td>
                    </tr>
                    <input type="hidden" name="oculto" value="1">
                    <tr>
                        <td><input type="reset" name=""></td>
                        <td><input type="submit" value="Insert category"></td>
                    </tr>
                </table>
            </form>
    </center>
    
</body>
</html>