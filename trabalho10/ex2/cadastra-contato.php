<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$mensagem = $_POST["mensagem"] ?? "";

try {

  // NÃO FAÇA ISSO! Exemplo de código vulnerável a injeção de SQL
  $sql = <<<SQL
  INSERT INTO Contato (nome, email, mensagem)
  VALUES ('$nome', '$email', '$mensagem');
  SQL;  

 
  $pdo->exec($sql);
  header("location: mostra-contatos.php");
  exit();
} 
catch (Exception $e) {  
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
