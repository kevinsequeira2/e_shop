<?php 
    error_reporting(E_ERROR);
    require "database.php";
    require "l_admin.php";
    session_start();
    
    if(isset($_SESSION['id'])){
        $sentence = $bd->query("SELECT id,user,password FROM users where id='$_SESSION[id]';");
        $users = $sentence->fetchAll(PDO::FETCH_OBJ);

    }
    
    $id_category=$_POST['id_category'];
    $sentence3 = $bd->query("SELECT * FROM products where id_category='$id_category';");
    $products = $sentence3->fetchAll(PDO::FETCH_OBJ);


    $send = $bd->query("SELECT count(distinct purchase.id_client) as client_buy,
    sum(buy.quantity) as total_product
    ,sum(purchase.total) as total_cash from purchase INNER JOIN buy;");
    $buy = $send->fetchAll(PDO::FETCH_OBJ);

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
    <h3><button id="firstText"><a href="logout.php">LOGOUT</a></button></h3>
    <h5 id="firstText"><?php require "partials/header.php"; ?></h5>
    <h1 id="firstText">Welcome to admin E-SHOP</h1>
    <?php
    foreach ($users as $data) {

        ?>  
        <h2 id="firstText"><?php echo $data->user; ?></h2>  
        <?php
        }
        ?>
    <center>
        <table id="firstText">
            <tr>
                <th>Total client buy---</th>
                <th>Total cash---</th>
                <th>Total Products buy</th>
            </tr>
            <?php foreach ($buy as $key) {?>
            <tr>
                <th><?php echo $key->client_buy ?></th>
                <th><?php echo $key->total_product ?></th>
                <th><?php echo $key->total_cash ?></th>
            </tr>
            <?php } ?>
        </table>
    </center>
    <center>
        
        <form  method="POST" action="welcomeAdmin.php">
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
        <button><a href="editViewAdmin.php">Aministrator</a></button>        
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
            <button id="firstText" ><a href="editViewProducts.php">AdministratorProducts</a></button>
    
    </center>
    

</body>
</html>