<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Produtos</title>
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
<h1>Cadastro de Produtos</h1> <br>

<form action="#" method="POST">
        <fieldset class="itens">
            <div>
                <label><strong>Nome:</strong></label>
                <input type=text name=nome placeholder= "Digite seu nome"><br>
            </div>
            <div>
                <label><strong>Categoria</strong></label>
                <input type=text name=categoria placeholder= "Digite a categoria"><br>
            </div>
            <div>
                <label><strong>Descrição</strong></strong></label>
                <input type=text name=descricao placeholder= "Digite a discrição"><br>
            </div>
            <div>
                <label><strong>Quantidade:</strong></strong></label>
                <input type=number name=quantidade><br>
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
            <input type=submit name=botao value=Deletar>
        </fieldset>   
    </form>
<br>

<?php
    require('config.php');
    require('verifica.php');

        if(@$_REQUEST['botao'] =="Gravar")
        {
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $quantidade = $_POST['quantidade'];

            $query = "INSERT INTO produto (nome, categoria, descricao, quantidade ) values ('$nome', '$categoria', '$descricao', '$quantidade')";
            $result = mysqli_query($con, $query);
            if(!$result) echo mysqli_error($con);
        }
        if (@$_REQUEST['botao'] =="Deletar")
        {
            $id = $_POST['id'];

            $query = "DELETE FROM produto WHERE id = '$id'";
            $result = mysqli_query($con, $query);
            if(!$result) echo mysqli_error($con);
        }
?>
    
</body>
</html>