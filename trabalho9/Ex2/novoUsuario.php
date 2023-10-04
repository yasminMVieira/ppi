<?php

require "usuarios.php";

// coleta os dados do formulário
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

// cria um novo usuario e acrescenta no arquivo de texto
$novousuario = new Usuario($email, $senha);
$novousuario->AddToFile("usuarios.txt");

// redireciona o navegador para a página de listagem de usuarios
header("location: listaUsuarios.php");

?>