# Atividade Crud

(aula da semana passada)
Na atividade de hoje aprendemos, sobre como criar uma tela de formulário, implementando o banco de dados com PHP.

Na primeira parte do trabalho configuramos o XAMPP e fizemos uma pequeno tutorial de como utilizar/configurar o XAMPP com o APACHE e PHP.

Logo após isso fomos para o VsCode e criamos toda a tela de login, com as seguintes telas, home.php, logout, script.sql e index.php. E assim então criamos toda logica por trás e fizemos um simples sistema de logar alguém.
Também além da pessoa poder logar ela pode dar logout e logar novamente.


# Aula 01/06

Na aula de hoje criamos e alteramos muitas coisas no projeto incial de entender e codar um crud no vscode.

Utilizamos uma organização de documentação para criar as páginas e utilizamos o XAMPP para ligar com o phpmyadmin para assim funcionar nossa ligação do código com o banco.

Utilizamos a pasta infra para organizar tudo e separamos entre os banco de dados, redes e a pasta public. Na db(banco de dados) fica as páginas connect.php e script.sql, já na pasta public fica a pasta component, a página home.php e logout.php. Também utilizamos o index claro que é a base de todo o nosso código.

Este código é uma implementaçlão simples de uma tela de login, só que diferente das outras aulas que faziamos telas de login super elaboradas agora foi uma tela simples mas implementando pela primeira vez o banco de dados. O sistema é simples utilizando o php nós adicinamos um usuário ele vai pro banco e conseguimos armazenar sua senha e seu usuário para assim ele fazer seu login. E logo após disso aparece uma tabela com os usuários cadastrados até então.

# Aula 03/06

Na aula do do dia 03/06 iremos complementar o nosso CRUD implementando o editar e excluir usuário.

A implementação da parte de excluir um usuário, foi feita com base o que já tinhamos feito em html e php na página home, então editei uma parte seguindo a ideia.

Para iniciar eu tive que mudar algumas coisas e adicionar um label e um input para o usuário escrever o nome de quem ele quer excluir e assim clicar num botão e excluir.
Tive algumas dificuldades de implementar esse botão pois estava dando conflito ocm o botão de adicionar assim tive que dar name e um value para cada button, assim conseguindo realizar esta parte sem problemas.

Mas a lógica por trás do funcionamento no código é assim verificar se o usuario colocou algo, adicionou algo, mexeu e depois ele puxa a váriavel que eu criei para exclusão e dai dps coloquei a função do crud em banco de dados "DELETE FROM" dai coloquei buscando um usuario ou seja pelo nome em vez do id, por que quando eu tentei pelo id tava dando problemas e apaguei todos os usuários então, decidi utilziar o nome dos usuários.

Para fazer a parte de excluir do trabalho eu mexi nos arquivos da página home.php e no index.php.

Então a principal parte de excluir é essa aqui:

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

 Como eu expliquei serve para verificar uma ação e depois procurar esse usuário e irá excluir como quem está utilizando o site preferir e na parte final do código serve para se der certo a exclusão mostra um alert falando que deu certo a exclusão.


