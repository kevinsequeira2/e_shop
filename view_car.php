<?php
    require "database.php";
    session_start();
    $id_client = $_SESSION['id'];
    $sentence = $bd->query("SELECT p.id,p.name,p.id_category,p.description,p.Precio,p.Stock,p.SKU,p.image from products as p
    INNER JOIN car as c 
    on p.id = c.id_product
    INNER JOIN users as u
    on c.id_client = u.id and id_client = $id_client;");
    $products = $sentence->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car</title>
</head>
<body>
<center>
        <h1 id="firstText">Car</h1>

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
                    <th><button><a href="viewClient.php?id=<?php echo $data3->id; ?>">BUY</a></button></th>
                </tr>
                
                <?php } ?>
                

        </table>

    </center>
</body>
</html>