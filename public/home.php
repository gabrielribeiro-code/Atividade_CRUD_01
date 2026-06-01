<?php

include("infra/db/connect.php");
//Aqui realizamos a conexão do php com o file connect.php assim não precisando startar o php em todas as páginas.

if(!isset($_SESSION["usuario"])){
    header("Location:  ../index.php");
    exit(); //Está pequena parte do código serve para 
}


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuario(usuario, senha) VALUES ('$usuario','$senha')";
    
    if($conn -> query($sql) === TRUE){

    echo "<script> alert('Usuario Cadastrado com sucesso')</script>";


    }else{

    echo "<script> alert('Usuario não cadastrado com sucesso')</script>";

    }

}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
     <link rel="stylesheet" href="../style/style.css">

</head>
<body>
     <?php
        include("../public/component/navbar.php");
    ?>
    
<h2>Bem-Vindo!</h2>

<p> Usuário Logado:

    <?php  echo $_SESSION["usuario"];?>

</p>

<h2> Cadastrar novo Usuário </h2>

<form method="POST">

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button type="submit">Entrar</button>

    </form>

<?php
 include("../public/component/table.php");
?>

 
<a href="logout.php">Sair</a>

</body>
</html>