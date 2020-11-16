<?php 
    error_reporting(E_ERROR);
    session_start();
    require "database.php";
    $id_client=$_SESSION['id'];
    $sentence = $bd->query("SELECT *FROM purchase WHERE id_client = $id_client;");
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
            <th>id</th>
            <th>Code</th>
            <th>Date</th>
            <th>Total</th>
            <th>VIEW BUY</th>

        </tr>
        <?php foreach ($buy as $data) {?>
        <tr>
            <td><?php echo $data->id; ?></td>
            <td><?php echo $data->code; ?></td>
            <td>|<?php echo $data->date; ?>|</td>
            <td><?php echo $data->total; ?></td>
            <td><button><a href="especifitView.php">GO</a></button></td>

        </tr>
        <?php } ?>
    </table>
</center>
<center>
    <button id="firstText"><a href="welcome.php?id=<?php echo $data->code; ?>">Back welcome</a></button>
</center>
    
</body>
</html>