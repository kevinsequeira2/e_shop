<?php  

	include 'database.php';
	//data for insert users
	$name = $_POST['name'];
	$lastName = $_POST['lastName'];
	$cellPhone = $_POST['cellPhone'];
	$address = $_POST['address'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$type ="client";
	//here is insert users in the database
	$sentence = $bd->prepare("INSERT INTO users(type,user,lastName,cellphone,address,email,password) VALUES (?,?,?,?,?,?,?);");
	$result = $sentence->execute([$type,$name,$lastName,$cellPhone,$address,$user,$password]);

	if ($result === TRUE) {
        echo "suscesfull register";
		require "partials/header.php";

	}else{
		echo "Error";
	}
?>