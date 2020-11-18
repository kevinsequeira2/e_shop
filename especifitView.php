<?php  
    session_start();
    $id_client = $_SESSION['id'];
    include 'database.php';
    if (!isset($_GET['id'])) {
		header('Location: especifitView.php');
    }
    //with this querry you can get a especifit product
    $id_especifit= $_GET['id'];
    $sentence = $bd->query("SELECT buy.date,(buy.quantity*products.Precio) as total,products.description,products.Precio FROM buy 
    INNER JOIN products
    on buy.id_product=products.id and buy.id_client=$id_client
    INNER JOIN purchase
    on purchase.id_client = buy.id_client and purchase.code=buy.code and buy.code=$id_especifit;");
    $buy = $sentence->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Especifit buy</title>
</head>
<body>
    <center>
    <!--this form show especifits products-->
        <table id="firstText">
            <tr>
                <th>Date</th>
                <th>Total</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php foreach ($buy as $data) { ?>
            <tr>
                <td><?php  echo $data->date; ?></td>
                <td><?php  echo $data->total; ?></td>
                <td><?php  echo $data->description; ?></td>
                <td><?php  echo $data->Precio; ?></td>
            </tr>
            <?php } ?>
        </table>
    </center>
    
    <center>
                <button id="firstText"><a href="viewBuys.php">Back</a></button>
    </center>
</body>
</html>