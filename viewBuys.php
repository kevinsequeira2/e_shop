<?php 
    error_reporting(E_ERROR);
    session_start();
    require "database.php";
    $id_client=$_SESSION['id'];
    $sentence = $bd->query("SELECT p.name,p.description,b.quantity,b.date FROM products as p
    INNER JOIN buy as b on b.id_product=p.id
    INNER JOIN buy as bu on bu.id_client=$id_client;");
    $buy = $sentence->fetchAll(PDO::FETCH_OBJ);;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Buys</title>
</head>
<body>
<center>
    <table id="firstText">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Date</th>

        </tr>
        <?php foreach ($buy as $data) {?>
        <tr>
            <td><?php echo $data->name; ?></td>
            <td><?php echo $data->description; ?></td>
            <td><?php echo $data->quantity; ?></td>
            <td><?php echo $data->date; ?></td>

        </tr>
        <?php } ?>
    </table>
</center>
<center>
    <button id="firstText"><a href="welcome.php">Back welcome</a></button>
</center>
    
</body>
</html>