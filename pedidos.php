<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Pedidos</title>
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

<h1>Cadastro dos Pedidos</h1> <br>

<form action="#" method="POST">
    <fieldset>
        <div>
            <label><strong>Cliente</strong>:</strong></label>
            <?php 
                $query = "SELECT id, nome FROM cliente ORDER BY nome";
                $result = mysqli_query($con, $query);
                if(!$result) echo mysqli_error($con);
            ?>
            <select class = "form" name="cliente" >
                <option value=" "> ..:: selecione ::.. </option>
                <?php
                    while( $row = mysqli_fetch_assoc($result) )
                    {
                ?>
                <option value="<?php echo $row['id']; ?>" ><?php echo @$row['nome'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label><strong>Data Compra:</strong></label>
            <input type=date name=data_compra><br>
        </div>
        <div>
            <label><strong>Pagamento</strong>:</strong></label>
            <?php 
                $query = "SELECT id, nome FROM forma_pagamento ORDER BY nome";
                $result = mysqli_query($con, $query);
                if(!$result) echo mysqli_error($con);
            ?>
            <select class = "form" name="pagamento" >
                <option value=" "> ..:: selecione ::.. </option>
                <?php
                    while( $row = mysqli_fetch_assoc($result) )
                    {
                ?>
                <option value="<?php echo $row['id']; ?>" ><?php echo @$row['nome'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label><strong>Data Registro:</strong></strong></label>
            <input type=date name=data_registro><br>
        </div>
        <div>
            <label><strong>Valor Total:</strong></strong></label>
            <input type=number name=valor_total><br>
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
    if(@$_REQUEST['botao'] =="Gravar")
    {
        $cliente = $_POST['cliente'];
        $data_compra = $_POST['data_compra'];
        $pagamento = $_POST['pagamento'];
        $data_registro = $_POST['data_registro'];
        $valor_total = $_POST['valor_total'];
        $quantidade = $_POST['quantidade'];

        $query = "INSERT INTO pedido (id_cliente, data_compra, id_pagamento, id_usuario, data_registro, valor_total, quantidade  ) values ('$cliente', '$data_compra', '$pagamento', '.$id_usuario.', '$data_registro', '$valor_total', '$quantidade')";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
    if (@$_REQUEST['botao'] =="Deletar")
    {
        $id = $_POST['id'];

        $query = "DELETE FROM pedido WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        if(!$result) echo mysqli_error($con);
    }
?>
    
</body>
</html>