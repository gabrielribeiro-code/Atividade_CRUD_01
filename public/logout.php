<?php 

session_start();
session_destroy();

header("Location:  ../index.php");
exit();

?>

//Está página "logout.php" serve para realizar o logout de algum usuário cadastrado logo após cadastrar sai da tela.

