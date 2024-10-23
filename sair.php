<?php

session_start();


session_destroy();


unset( $_SESSION["cpf"] );
unset( $_SESSION["senha"] );


header('location:index.php');
?>