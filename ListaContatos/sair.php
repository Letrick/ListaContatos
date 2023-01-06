<?php


session_start();

unset($_SESSION['id_usuario']); 

header("location: index.php"); //vai direcionar para a pagina de login





?>