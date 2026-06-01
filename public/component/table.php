<hr>

<h4> Usuários Cadastrados</h4>

<table border="1" cellpadding="2">

    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Senha</th>
    </tr>

    <?php
    

    $sqlUsuario = "SELECT * FROM usuario";

    $resultadoUsuario = $conn -> query($sqlUsuario);

    while($linha = $resultadoUsuario->fetch_assoc()){
        echo "<tr>
        
            <td>" . $linha["id"] . "</td>
            <td>" . $linha["usuario"] . "</td>
            <td>" . $linha["senha"] . "</td>
        
        </tr>";
    }
    

    //ESTA página de table.php serve para implementar dentro da nossa página home e na tela de login, a tela visualizada pelo usuário uma tela que aparece todos os usuários cadastradps até então.
    // Então as tags table, claro cria esta tabela e com o php conectamos com o banco de dados utilizando o comando select que busca todas essas informações dentro do banco.

    ?>

    

</table>