<?php 
    $sentence2 = $bd->query("SELECT * FROM category;");
    $category = $sentence2->fetchAll(PDO::FETCH_OBJ);

?>