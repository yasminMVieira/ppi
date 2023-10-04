<?php

/*Neste arquivo temos a coleta dos dados por meio de um array super global ($_POST) que permite
acessar os campos do formulario submetidos pelo metodo POST (criado no arquivo novoContato.html) */

require "contatos.php";

// coleta os dados do formulário
$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";

// cria um novo contato e acrescenta no arquivo de texto
$novoContato = new Contato($nome, $email, $telefone);
$novoContato->AddToFile("contatos.txt");

// redireciona o navegador para a página de listagem de contatos
header("location: listaContatos.php");

?>