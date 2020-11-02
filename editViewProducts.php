<?php  
	require 'database.php';
    
    $sentence2 = $bd->query("SELECT * FROM products;");
    $product2 = $sentence2->fetchAll(PDO::FETCH_OBJ);
    
    $sentence3 = $bd->query("SELECT * FROM category;");
    $category = $sentence3->fetchAll(PDO::FETCH_OBJ);
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
        
        <table id="firstText">
        <h1>Products</h1>
            <tr>
                <th>ID</th>
                <th>ID_Category</th>
                <th>Name</th>    
                <th>SKU</th>      
                <th>Description</th> 
                <th>Stock</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit</th>     
                <th>Delete</th>    
            </tr>
            <?php 
                foreach ($product2 as $pro){
            ?>
            <tr>
                <td><?php echo $pro->id; ?></td>
                <td><?php echo $pro->id_category; ?></td>
                <td><?php echo $pro->name; ?></td>
                <td><?php echo $pro->SKU; ?></td>
                <td><textarea cols="20" rows="5"><?php echo $pro->description; ?></textarea></td>
                <td><?php echo $pro->Stock; ?></td>
                <td><?php echo $pro->Precio; ?></td>
                <td><img src="<?php echo $pro->image; ?>" width="100px" height="100px"></td>
                <td><a href="e_product.php?id=<?php echo $pro->id; ?>">EDIT</a></td>
                <td><a href="d_category.php?id=<?php echo $pro->id; ?>">DELETE</a></td>
            </tr>
                <?php } ?>
        </table>
        <br>
        <button id="firstText"><b><a href="welcomeAdmin.php">Ready</a></b></button>
    </center>
    <center>
        <h3>Insert Products:</h3>
            <form method="POST" enctype="multipart/form-data" action="i_product.php">
                <table id="firstText">
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="txtname"></td>
                    </tr>
                    <tr>
                        <td>SKU: </td>
                        <td><input type="text" name="txtSKU"></td>
                    </tr>
                    <tr>
                        <td>Description: </td>
                        <td><input type="text" name="txtdescription" id=""></td>
                    </tr>
                    <tr>
                        <td>Stock: </td>
                        <td><input type="number" name="txtstock"></td>
                    </tr>
                    <tr>
                        <td>Price: </td>
                        <td><input type="number" name="txtprice"></td>
                    </tr>
                    <tr>
                        <td>Image: </td>
                        <td><input type="file" name="txtimage"></td>
                    </tr>
                    <tr>
                        <td>Product: </td>
                        <td>
                            <select  id="firstText" name="id_category">
                                <?php 
                                    foreach ($category as $data2){
                                ?>
                                <option value="<?php echo $data2->id; ?>"><?php echo $data2->name; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <input type="hidden" name="oculto" value="1">
                    <tr>
                        <td><input type="reset" name=""></td>
                        <td><input type="submit" value="Insert product"></td>
                    </tr>
                    
                </table>
            </form>
    </center>
    
</body>
</html>