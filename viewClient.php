<?php 
    error_reporting(E_ERROR);
    require "database.php";
    require "l_admin.php";

    $id_category=$_POST['id_category'];
    $sentence3 = $bd->query("SELECT * FROM products where id_category='$id_category';");
    $products = $sentence3->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>welcome</title>
</head>
<body>
    <center>
        <h1 id="firstText">Buys</h1>

        <form  method="POST" action="viewClient.php">
            <h2><b>Categories</b></h2>
            <select  id="firstText" name="id_category">
                <?php 
                    foreach ($category as $data2){
                ?>
                <option value="<?php echo $data2->id; ?>"><?php echo $data2->name; ?>
            </option>
            <?php } ?>
            </select>
            <button type="submit">viewProducts</button>        
            </form>
        <br>
        <label><b>List products</b> </label>
        <table id="firstText">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
                <?php 

                    foreach ($products as $data3){
                ?>
                <tr>
                    <td><?php echo $data3->id; ?></td>
                    <td><?php echo $data3->name; ?></td>
                    <th><?php echo $data3->SKU; ?></th>
                    <th><textarea name="" id="" cols="20" rows="3"> <?php echo $data3->description; ?></textarea></th>
                    <th><?php echo $data3->Stock; ?></th>
                    <th><?php echo $data3->Precio; ?></th>
                    <th><img src="<?php echo $data3->image; ?>" width="100px" height="100px"></th>
                </tr>
                
                <?php } ?>
                

        </table>

    </center>

</body>
</html>