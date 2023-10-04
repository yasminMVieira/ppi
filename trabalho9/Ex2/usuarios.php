<?php

class Usuario
{
  public $email;
  public $senha;

  function __construct($email, $senha)
  {
    $this->email = $email;
    $this->senha = $senha;
  }

  public function AddToFile($arquivo)
  {
    // abre o arquivo para escrita de conteúdo no final
    $arq = fopen($arquivo, "a");
    $hash_senha = password_hash($this->senha, PASSWORD_DEFAULT);
    fwrite($arq, "\n{$this->email};{$hash_senha}");
    fclose($arq); 
  }
}

function carregaUsuariosDeArquivo()
{
  $arrayusuarios = null;
  
  // Abre o arquivo usuarios.txt para leitura
  $arq = fopen("usuarios.txt", "r");
  if ( !$arq )
    return null;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $usuarios
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo
    $usuario = fgets($arq); 
    
    // Separa dados na linha utilizando o ';' como separador
    list($email, $senha) = array_pad(explode(';', $usuario), 2, null);

    // Cria novo objeto representado o usuario e adiciona no final do array
    $novousuario = new Usuario($email, $senha);
    $arrayusuarios[] = $novousuario;
  }
      
  // Fecha o arquivo
  fclose($arq);  
  return $arrayusuarios;
}

?>