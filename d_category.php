<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$code = $_GET['id'];
    include 'database.php';
    
    $sentence2 = $bd->query("SELECT name FROM products where id_category=$code;");
    $products = $sentence2->fetchAll(PDO::FETCH_OBJ);
    
    foreach ($products as $data) {
        
    }
    if ($data->name==null) {
        $sentence = $bd->prepare("DELETE FROM category WHERE id = ?;");
        $result = $sentence->execute([$code]);

        if ($result === TRUE) {
            header('Location: editViewAdmin.php');
        }else{
            echo "Error";
        }
    }else {
        echo "error esta categoria no se puede eliminar porque tiene productos asociados";
    }

	

?>