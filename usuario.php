<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Usuários</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
    require('config.php');
    require('verifica.php');
?>
    
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
<h1>Cadastro de Usuários</h1> <br>
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
            <label><strong>Telefone:</strong></label>
            <input type=text name=telefone placeholder= "Digite seu telefone"><br>
        </div>
        <div>
            <label><strong>Endereço:</strong></label>
            <input type=text name=endereco placeholder= "Digite seu endereço"><br>
        </div>
        <div>
            <label><strong>Número:</strong></label>
            <input type=text name=numEd placeholder= "Digite o número"><br>
        </div>
        <div>
            <label><strong>Complemento:</strong></label>
            <input type=text name=complemento placeholder= "Digite complemento"><br>
        </div>
        <div>
            <label><strong>Cidade:</strong></label>
            <input type=text name=cidade placeholder= "Escolha a cidade"><br>
        </div>
        <div>
            <label><strong>Estado:</strong></label>
            <input type=text name=estado placeholder= "Escolha o estado"><br>
        </div>
        <div>
            <label><strong>Login</strong>:</strong></label>
            <input type=text name=login placeholder= "Digite seu login"><br>
        </div>
        <div>
            <label><strong>Senha</strong>:</strong></label>
            <input type=password name=senha><br>
        </div>
        <div>
            <label><strong>Nivel</strong>:</strong></label>
            <input type=radio name=nivel value=ADM><strong> Administrador</strong><input type=radio name=nivel value=USER><strong> Usuário</strong><br>
        </div>
        <input type=submit name=botao value=Gravar>
    </fieldset>
</form> 
<br>
    <form action="" method="POST">
        <fieldset>
            <div>
                <label><strong>ID</strong>:</label>
                <input type="text" name= "id">
            </div>
            <input type=submit name=botao value=Deletar>
        </fieldset>   
    </form>
<br>

<br>
<?php

    if(@$_REQUEST['botao'] =="Gravar")
    {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $numEd = $_POST['numEd'];
        $complemento = $_POST['complemento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];

        $query = "INSERT INTO usuario (nome, cpf, telefone, endereco, numEd, complemento, cidade, estado, login, senha, nivel) values ('$nome', '$cpf', '$telefone', '$endereco', '$numEd', '$complemento', '$cidade', '$estado', '$login', '$senha', '$nivel')";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
    if (@$_REQUEST['botao'] =="Deletar")
    {
        $id = $_POST['id'];
        $query = "DELETE FROM usuario WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
?>
</body>
</html>