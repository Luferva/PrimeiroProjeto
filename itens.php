<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>NutriPlay - Itens</title>
    
</head>
<body>

<?php
    require('config.php');
    require('verifica.php');
?>

<?php
    if (@$_REQUEST['id'] and !$_REQUEST['botao'])
    {
        $query = "
            SELECT * FROM itens WHERE id='{$_REQUEST['id']}'
        ";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        //echo "<br> $query";	
        foreach( $row as $key => $value )
        {
            $_POST[$key] = $value;
        }
    }
    if(@$_REQUEST['botao'] =="Gravar")
    {
        $nome = $_POST['nome'];
        $data_validade = $_POST['data_validade'];
        $categoria = $_POST['categoria'];
        $data_registro = $_POST['data_registro'];
        $quantidade = $_POST['quantidade'];

        $query = "INSERT INTO itens (nome, data_validade, categoria, id_usuario, data_registro, quantidade ) values ('$nome', '$data_validade', '$categoria', '.$id_usuario.', '$data_registro', '$quantidade')";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
    if (@$_REQUEST['botao'] =="Deletar")
    {
        $id = $_POST['id'];

        $query = "DELETE FROM itens WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
    if(@$_REQUEST['botao'] =="Atualizar")
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $data_validade = $_POST['data_validade'];
        $categoria = $_POST['categoria'];
        $data_registro = $_POST['data_registro'];
        $quantidade = $_POST['quantidade'];

        $insere = "UPDATE itens SET 
					nome = '$nome'
					, data_validade = '$data_validade'
					, categoria = '$categoria'
                    , id_usuario = '$id_usuario'
                    , data_registro = '$data_registro'
                    , quantidade = '$quantidade'
					WHERE id = '$id'
				";
		$result_update = mysqli_query($con, $insere);
    }
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

<h1>Cadastro de Itens</h1> <br>

<form action="itens.php" method="POST" name="itens">
    <fieldset>
        <div> 
            <label><strong>ID:</strong></label>
            <input type="text" name="id" value="<?= @$_POST['id']; ?>">
        </div>
        <div>
            <label><strong>Nome:</strong></label>
            <input type=text name=nome value="<?php echo @$_POST['nome']; ?>" placeholder= "Digite seu nome"><br>
        </div>
        <div>
            <label><strong>Data Validade:</strong></label>
            <input type=date name=data_validade value="<?php echo @$_POST['data_validade']; ?>" ><br>
        </div>
        <div>
            <label><strong>Categoria</strong></label>
            <input type=text name=categoria value="<?php echo @$_POST['categoria']; ?>" placeholder= "Digite a categoria"><br>
        </div>
        <div>
            <label><strong>Data Registro:</strong></strong></label>
            <input type=date name=data_registro value="<?php echo @$_POST['data_registro']; ?>" ><br>
        </div>
        <div>
            <label><strong>Quantidade:</strong></strong></label>
            <input type=number name=quantidade value="<?php echo @$_POST['quantidade']; ?>"><br>
        </div>
        <input type=submit name=botao value=Gravar>
        <input type=submit name=botao value=Atualizar>

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



    
</body>
</html>