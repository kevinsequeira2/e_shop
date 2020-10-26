<?php  

	include 'database.php';
	$user = $_POST['user'];
	$password = $_POST['password'];

	$sentence = $bd->prepare("INSERT INTO users(user,password) VALUES (?,?);");
	$result = $sentence->execute([$user,$password]);

	if ($result === TRUE) {
        echo "suscesfull register";
		require "partials/header.php";

	}else{
		echo "Error";
	}
?>