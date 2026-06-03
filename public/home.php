<?php

include("../infra/db/connect.php");
//Aqui realizamos a conexão do php com o file connect.php assim não precisando startar o php em todas as páginas.

if(!isset($_SESSION["usuario"])){
    header("Location:  ../index.php");
    exit(); //Está pequena parte do código serve para se não existir um usuário autenticado ele não consegue entrar nas próximas páginas do site.
}

//ADICIONAR

if($_SERVER["REQUEST_METHOD"] == "POST"){ //Está parte serve para verifiicar se o usuario mandou algo, enviou o formulário ou algum dado.

    if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO usuario(usuario, senha) VALUES ('$usuario','$senha')";
    
    if($conn -> query($sql) === TRUE){ 

    echo "<script> alert('Usuario Cadastrado com sucesso')</script>";


    }else{

    echo "<script> alert('Usuario não cadastrado com sucesso')</script>";

    }

    }


//Esta parte serve para conectar com o banco de dados e colocar em nossa tela um alert caso o funcionamento do login seja realizado com sucesso ou não.

}
?>


<!-- EXCLUIR -->

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){ //Está parte serve para verifiicar se o usuario mandou algo, enviou o formulário ou algum dado.

     if(isset($_POST['acao']) && $_POST['acao'] == 'excluir') { // serve para clicar no botao excluir e funcionar e nao fazer a ação tanto de excluir e adicionar
        $usuario_ex = $_POST["usuario_ex"]; // pega o usuário selecionado para excluir.

    $sql = "DELETE FROM usuario WHERE usuario = '$usuario_ex' ";

    if($conn -> query($sql) === TRUE){ 

    echo "<script> alert('Usuario Excluido com sucesso')</script>";


    }else{

    echo "<script> alert('Usuario não foi excluido')</script>";

    }
     }
}

?>

<!-- EDITAR -->

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){ 

     if(isset($_POST['acao']) && $_POST['acao'] == 'editar') { 
        $usuario_ex = $_POST["usuario_ed"]; 

    $sql = " UPDATE usuario set usuario = ? senha = ? WHERE id = ?";





    if($conn -> query($sql) === TRUE){ 

    echo "<script> alert('Usuario Editado com sucesso')</script>";


    }else{

    echo "<script> alert('Usuario não foi editado')</script>";

    }
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
        
        //Esta parte do código serve para colocar uma navbar dentro da página home, utilizando 
        // o include de outra página assim deixando o código mais simples e fácil de ler e mais organizado.
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
        <button type="submit" name="acao" value="cadastrar">Entrar</button> 
 
        <!-- Essa parte do código serve principalmente para funcionar a parte de adicionar o usuário e colocamos um name e um value para funcionar e não conflitar com o outro botao que é de excluir. -->
    </form>

    <!-- 
    
Está parte do código é uma implementação simples em html para conseguir cadastrar um novo usuário.

-->

<form method="POST">

    <h2> Excluir Usuários </h2> 

    <label for="usuario_ex">Quem você quer excluir?</label>
    <input type="text" name="usuario_ex">

    <button type="submit" name="acao" value="excluir">Excluir</button> 

    <!-- Esta parte do código serve para não conflitar os botões do entrar e excluir, e este é uma parte visual né do funcionamento em que incluimos um input para digitar qual, queremos excluir. -->

</form>

<form method="POST">

    <h2> Editar Usuários </h2> 

    <label for="usuario_ed">Quem você quer editar?</label>
    <input type="text" name="usuario_ed">

    <button type="submit" name="acao" value="excluir">Editar</button> 






<?php
 include("../public/component/table.php");

 //Esta parte do code é so para adicionar uma tabela para visualizar todas as pessoas cadastradas até então.
?>

 
<a href="logout.php">Sair</a>

</body>
</html>