

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <!--with this form the user can login-->
    <h5 id="firstText"><?php require "partials/header.php"; ?></h5>
    <h1 id="firstText">Login</h1>
    <form  method="POST" action="l_login.php">
        <input id="firstText" type="text" name="user" placeholder="insert your email">
        <input id="firstText" type="password" name="password" placeholder="insert your password">
        <input id="firstText" type="submit" name="send">
    
    </form>
    
</body>
</html>