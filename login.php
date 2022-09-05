<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon">
    <title>NutriPlay - Login </title>
    <style>

        /* Paleta de Cores
         #AAAAFF
         #719CD4
         #475DAC
         #14778D
         #9137D9
        */

        * {
            margin: 0;
            padding: 10;
            text-align: center;
        }

        body{
           background-color: #AAAAFF;
           font-family: Arial, Helvetica, sans-serif;
           font-size: 1em;
           color: black;
           margin-top: 5%;
           justify-content: center; 
        }

        input{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1em;
            border-radius: 5px;

        }

        fieldset {
        border: 0;
        height: 80px;
        width: 300px;
        background-color: #9137D9;
        margin: auto;
        padding-top: 10px;
        border-radius: 5px;
        box-shadow: 3px 3px 4px rgba(24, 21, 21, 0.541);
        }

        label:hover {
            color: #AAAAFF;
        }

        div{
            margin: auto;
            padding-bottom: 10px;
        }
    </style>
    
</head>
<body>

<header><img src="imagens/DesenhoNutriPlay.png" height= 275 width = 300 alt="NutriPlay"></header><br>

<div>
    <h1>Seja Bem-vindo</h1>
    <br>
</div>

<form action=# method=post>
<fieldset>
    <div>
        <label><strong>Login:</strong></label>
        <input type=text name=login placeholder= "Digite seu login"><br>
    </div>
    <div>
        <label><strong>Senha:</strong></label> 
        <input type=password name=senha><br>
        <input type=submit name=botao value=Entrar>
    </div>
</fieldset>

<?php
include ('config.php');
session_start(); // inicia a sessao	


if (@$_REQUEST['botao']=="Entrar")
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	$query = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$result = mysqli_query($con, $query);
	while ($coluna=mysqli_fetch_array($result)) 
	{
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		$_SESSION["UsuarioNivel"] = $coluna["nivel"];

		// para direcionar a páginas diferentes com base no nivel do usuário
		$niv = $coluna['nivel'];
		if($niv == "USER"){ 
			header("Location: menu_Usuario.php"); 
			exit; 
		}
		
		if($niv == "ADM"){ 
			header("Location: menu_Adm.php"); 
			exit; 
		}
		
	}
	
}

?>

</body>
</html>