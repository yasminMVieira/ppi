<?php

$cep = $_GET['cep'] ?? ''; // Recebe o cep via GET

/* Simula uma busca no banco de dados, 
porem no exemplo basico utiliza if/else e somente 2 cidades disponiveis */
if ($cep == '38400-100')
  echo 'Uberlândia';
else if ($cep == '38700-000')
  echo 'Patos de Minas';
else {
  http_response_code(404); // Not Found
  echo "$cep is not available";
}