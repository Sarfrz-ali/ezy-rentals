<?php session_start();
session_unset();
session_destroy();
header("Location: http://localhost/ezy%20rentals/sign%20in.php");
?>
