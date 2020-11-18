<?php
//here break login of user
session_start();
unset($_SESSION["id"]);
header("Location:index.php");
?>