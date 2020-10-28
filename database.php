<?php  
	$password = '1234';
	$user = 'kevin';
	$database= 'e_shop';

	try {
		$bd = new PDO(
			'mysql:host=localhost;
			dbname='.$database,
			$user,
			$password,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);
	} catch (Exception $e) {
		echo "Error de conexión ".$e->getMessage();
	}



?>