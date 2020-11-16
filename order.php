<?php 
    error_reporting(E_ERROR);
    session_start();
    require "database.php";
    $id_client=$_SESSION['id'];
    $sentence = $bd->query("SELECT sum(quantity) as total_of_products,sum(quantity*products.Precio) as total
    from car INNER JOIN products
    on id_product=products.id and  id_client=$id_client;");
    $car = $sentence->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>purchase order</title>
</head>
<body>
    <center><h1>Purchase order</h1></center>
    <center>
        <table id="firstText"> 
            <tr>
                <th>
                    Total products
                </th>
                <th>
                    Total Price
                </th>
            </tr>
            <?php foreach ($car as $data) { ?>
            <tr>
                <td><?php echo $data->total_of_products; ?></td>
                <td><?php echo $data->total; ?></td>
            </tr>
            <?php }?>
        </table>
        
    </center>
    <center><button><a href="deleteCar.php">CONFIRM</a></button></center>
</body>
</html>