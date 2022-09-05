<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Clientes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
<header><img src="imagens/DesenhoNutriPlay.png" height= 275 width = 300 alt="NutriPlay"></header><br>

<nav>
    <a href="itens.php">Itens</a>
    <a href="produtos.php">Produtos</a>
    <a href="cadastroCliente.php">Clientes</a>
    <a href="usuario.php">Usuário</a>
    <a href="pedidos.php">Pedidos</a>
    <a href="relatorio.php">Relatorio</a>
</nav>   

<br>

<h1>Cadastro de Clientes</h1> <br>

<form action="#" method="POST">
    <fieldset>
        <div>
            <label><strong>Nome:</strong></label>
            <input type=text name=nome placeholder= "Digite seu nome"><br>
        </div>
        <div>
            <label><strong>CPF:</strong></label>
            <input type=text name=cpf placeholder= "Digite seu CPF"><br>
        </div>
         <div>
            <label><strong>Telefone:</strong>:</strong></label>
            <input type=tel name=telefone placeholder= "Digite seu telefone"><br>
        </div>
        <div>
            <label><strong>Data Registro:</strong>:</strong></label>
            <input type="date" name=data_registro><br>
        </div>
        <input type=submit name=botao value=Gravar>
    </fieldset>
</form> 
<br>
<form action="" method="POST">
    <fieldset class="delete">
        <div>
            <label><strong>ID</strong>:</label>
            <input type="text" name= "id">
        </div>
        <input type=submit name=botao value=Deletar >
    </fieldset>   
</form>
<br>
<?php
    require('config.php');
    require('verifica.php');

     if(@$_REQUEST['botao'] =="Gravar")
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $data_registro = $_POST['data_registro'];

        $query = "INSERT INTO cliente (nome, cpf, telefone, id_usuario, data_registro) values ('$nome', '$cpf', '$telefone', '.$id_usuario.', '$data_registro')";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
    if (@$_REQUEST['botao'] =="Deletar")
    {
        $id = $_POST['id'];

        $query = "DELETE FROM cliente WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
?>
    
</body>
</html>