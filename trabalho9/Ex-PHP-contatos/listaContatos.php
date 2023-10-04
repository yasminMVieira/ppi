<!DOCTYPE html>

<!-- Neste arquivo temos o carregamento para exibição dos dados que foram adicionados ao arquivo .txt.
A exibição é feita em formato tabela, por isso temos uma estrutura html nesse arquivo, além disso, para
preenchemos essa tabela com os dados já existentes, utilizamos um script .php para executar um loop
e dessa forma exibir os dados, que foram obtidos por meio da invocação de funções auxiliares que estão
no arquivo contatos.php e posteriormente "tratadas" por meio do uso de htmlspecialchars o qual realiza conversoes
antes de inserir o conteudo na página -->

<html lang="en">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página Dinâmica</title>
    
    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body>

<div class="container">
  
  <h3>Contatos Carregados do Arquivo <i>contatos.txt</i></h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
      </tr>
    </thead>
    
    <tbody>
		<?php
    require "contatos.php";
    $arrayContatos = carregaContatosDeArquivo();	
    if ($arrayContatos != NULL)
    {
      foreach ($arrayContatos as $contato)
      {    
        $nome = htmlspecialchars($contato->nome);
        $email = htmlspecialchars($contato->email);
        $telefone = htmlspecialchars($contato->telefone);

        echo <<<HTML
        <tr>
          <td>$nome</td>
          <td>$email</td>
          <td>$telefone</td>
        </tr>
        HTML;
      }
    }		
		?>
    </tbody>
  </table>
  <a href="index.html">Voltar à página inicial</a>
</div>

</body>
</html>