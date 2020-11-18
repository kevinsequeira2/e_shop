<?php
    require "database.php";
    //script for send mail
        if ($argc <= 1)
        {
        echo "Arguments missing...\n";
        echo "Use:\n\n\tphp sendmail recipient@email.com subject\n\n";
        exit;
        }
        $result = $argv[1];
        $sentence = $bd->query("SELECT SKU,Stock FROM products where Stock>=$result;");
        $stock = $sentence->fetchAll(PDO::FETCH_OBJ);
        foreach ($stock as $data) {
            
        }
        $to = "kevinsequeira23@gmail.com";
        $subject = "Productos con bajo stock";
        $message = "<?php echo $data->SKU; echo $data->Stock;?>";
     
        mail($to, $subject, $message);

?>