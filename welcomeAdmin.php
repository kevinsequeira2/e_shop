<?php 
    require "database.php";
    require "l_admin.php";
    session_start();
    
    if(isset($_SESSION['id'])){
        $sentence = $bd->query("SELECT id,user,password FROM users where id='$_SESSION[id]';");
        $users = $sentence->fetchAll(PDO::FETCH_OBJ);

    }
    $id_category=$_POST['id_category'];
    $sentence3 = $bd->query("SELECT id,name FROM products where id_category='$id_category';");
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
        
        <form  method="POST" action="welcomeAdmin.php">
        <h2><b>Categories</b></h2>
        <select  id="firstText" name="id_category">
            <?php 
                foreach ($category as $data2){
            ?>
            <option value="<?php echo $data2->id; ?>"><?php echo $data2->name; ?></option>
            <?php } ?>
        </select>
        <button type="submit">viewProducts</button>
        <br><a href="#">Delete</a><br>
        <a href="#">Edit</a>

        </form>
        <br>
        <label><b>List products</b> </label>
        <table id="firstText">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    <?php 

                        foreach ($products as $data3){
                    ?>
                    <tr>
                        <td><?php echo $data3->id; ?></td>
                        <td><?php echo $data3->name; ?></td>
                    </tr>
                    
                    <?php } ?>
                    

            </table>
    
    </center>
    

</body>
</html>