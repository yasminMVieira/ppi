<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
    SELECT nome, email, mensagem
    FROM contato
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Listagem de Tabela do MySQL</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h3>Dados na tabela <b>aluno</b></h3>
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Mensagem</th>
      </tr>
      <?php
      while ($row = $stmt->fetch()) 
      {
        $nome = $row['nome'];
        $email = $row['email'];
        $mensagem = $row['mensagem'];

        echo <<<HTML
        <tr>
          <td>$nome</td> 
          <td>$email</td>
          <td>$mensagem</td>
        </tr>      
        HTML;
      }
      ?>
    </table>
    <a href="index.html">Cadastrar novo contato</a>
  </div>

</body>

</html>