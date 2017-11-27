<?php  

session_start();

session_destroy();
header("Location: main_test.html");

?>