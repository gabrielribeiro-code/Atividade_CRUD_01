<?php



include("infra/db/connect.php");
//Como explicado nas outras páginas essa parte serve para utilizar do connect e não precisar startar sempre o php, utilizando a página connect.

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario 
    WHERE usuario = '$usuario' 
    AND senha = '$senha'";

    $resultado = $conn -> query($sql);

    if($resultado -> num_rows > 0){
        $_SESSION["usuario"] = $usuario;
        header("Location: public/home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos.";
    }
}

//Nesta parte toda do código de php nós estamos utilizando os comandos do banco de dados como o select para buscar e encontrar o usuário que criamos no banco e se achar,
//ira funcionar o login e se não funcionar irá aparecer uma mensagem de erro.

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com PHP</title>
</head>
<body>
     <?php
    include("public/component/table.php");
    ?>

    <h2>Login com PHP</h2>

    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <?php

            if(isset($erro)){
                echo $erro;
            }

            //Esta parte do código serve apenas para criar o pequena tela de formulário, a pequena tela de login colocando o espaço para adicionar o usuario, a senha ew o botõa para enviar.
        ?>
        <button type="submit">Entrar</button>
    </form>
    


    
</body>
</html>