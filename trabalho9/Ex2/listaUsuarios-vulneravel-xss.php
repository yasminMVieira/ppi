<!DOCTYPE html>
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
  
  <h3>usuarios Carregados do Arquivo <i>usuarios.txt</i></h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>E-mail</th>
        <th>Senha</th>
      </tr>
    </thead>
    
    <tbody>
		<?php
    require "usuarios.php";
    $arrayusuarios = carregausuariosDeArquivo();	
    if ($arrayusuarios != NULL)
    {
      foreach ($arrayusuarios as $usuario)
      {        
        echo <<<HTML
        <tr>
          <td>$usuario->email</td>
          <td>$usuario->senha</td>
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