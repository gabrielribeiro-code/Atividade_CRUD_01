<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "root";
$db = "sistema_simpless";

$conn = new mysqli($host,$user,$pass,$db);

//Está parte serve ser uma conexão com as outras páginas para assim não ter que startat o php em todas as páginas deixando o código mais limpo e simples.


// if($conn->connect_error){
  //  die("Erro na conexão");
//}else{
//    echo ("<p> BD: ok </p>");
//}

?>