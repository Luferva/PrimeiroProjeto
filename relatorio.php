<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Relatório</title>
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
<h1>Relatório de Vencimento</h1><br>

<form action="relatorio.php?botao=gravar" method="post" name="form1">
<fieldset>
<table width="95%" border="0" align="center">
  <tr>
    <td width="18%" align="right"><strong>Nome</strong>:</td>
    <td width="26%"><input type="text" name="nome" placeholder= "Nome para procurar" /></td>
    <td width="17%" align="right"><strong>Validade</strong>:</td>
    <td width="18%"><input type="date" name="validade" /></td>
    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</fieldset>
</form>
<br>
<?php if (@$_REQUEST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
    <tr bgcolor="#9137D9">
        <th width="5%">ID</th>
        <th width="30%">Nome</th>
        <th width="15%">Data Validade</th>
        <th width="30%">Categoria</th>
        <th width="15%">Data Registro</th>
        <th width="15%">Quantidade</th>
        <th width="15%">Opções</th>
    </tr>
    <?php
        $nome = $_POST['nome'];
	    $validade = $_POST['validade'];
	
	    $query = "SELECT *FROM itens WHERE id > 0 ";
        $query .= ($nome ? " AND nome LIKE '%$nome%' " : "");
        $query .= ($validade ? " AND data_validade = '$validade' " : "");
        $query .= " ORDER by data_validade ASC";
        $result = mysqli_query($con, $query);
	    while ($coluna=mysqli_fetch_array($result)) 
	    {	
	?>

    <tr>
      <th width="5%"><?php echo $coluna['id']; ?></th>
      <th width="30%"><?php echo $coluna['nome']; ?></th>
      <th width="15%"><?php echo $coluna['data_validade']; ?></th>
      <th width="15%"><?php echo $coluna['categoria']; ?></th>
      <th width="30%"><?php echo $coluna['data_registro']; ?></th>
      <th width="25%"><?php echo $coluna['quantidade']; ?></th>
      <th><a href="itens.php?pag=itens&id=<?php echo $coluna['id']; ?>">editar</a></th>
    </tr>

    <?php
	}
    ?>
</table>
<?php	
    }
?>



    
</body>
</html>