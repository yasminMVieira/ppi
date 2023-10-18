<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

$cep = $_GET['cep'] ?? ''; // Recebe o cep via GET

if (!empty($cep)) {
  // Execute a consulta SQL para buscar o endereço com base no CEP
  $query = "SELECT rua, bairro, cidade FROM enderecos_ex7 WHERE cep = ?";
  $stmt = $conexao->prepare($query);
  $stmt->bind_param("s", $cep);
  $stmt->execute();
  $stmt->bind_result($rua, $bairro, $cidade);

  // Verifique se o CEP foi encontrado no banco de dados
  if ($stmt->fetch()) {
    $endereco = new Endereco($rua, $bairro, $cidade);
  } else {
    $endereco = new Endereco('', '', '');
  }
}

header('Content-type: application/json'); // Define o tipo de conteúdo como JSON
echo json_encode($endereco); // Converte o objeto Endereco para JSON

  