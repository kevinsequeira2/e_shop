<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SIGNUP</title>
</head>
<body>
    <h5 id="firstText"><?php require "partials/header.php"; ?></h5>
    <h1 id="firstText">SINGNUP</h1>
    <form  method="POST" action="l_singnup.php">
        <input id="firstText" type="text" name="name" placeholder="insert your name">
        <input id="firstText" type="text" name="lastName" placeholder="insert your lastName">
        <input id="firstText" type="number" name="cellPhone" placeholder="insert your cellPhone">
        <input id="firstText" type="text" name="user" placeholder="insert your email">
        <input id="firstText" type="password" name="password" placeholder="insert your password">
        <br>
        <textarea name="address" id="firstText" cols="22" rows="4" placeholder="insert your address"></textarea>
        <br>
        <input id="firstText" type="submit" >
    
    </form>
    
</body>
</html>