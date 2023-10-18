<?php

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

if ($cep == '38400-100') // Simula uma busca no banco de dados porem no exemplo basico utiliza if/else e somente 2 cidades disponiveis
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
else {
  $endereco = new Endereco('', '', '');
}

header('Content-type: application/json'); // Define o tipo de conteudo como JSON
echo json_encode($endereco); // Converte o objeto endereco para JSON
