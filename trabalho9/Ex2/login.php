<?php

require "usuarios.php";

$encontrado = false;

// coleta os dados do formulário
$emailFornecido = $_POST["email"];
$senhaFornecida = $_POST["senha"];

// Ler o arquivo de texto de usuários e senhas
$arrayusuarios = carregaUsuariosDeArquivo();

$cont = 0;
if ($arrayusuarios != NULL) {
    foreach ($arrayusuarios as $usuario) {
        
        $email = $usuario->email;
        $senha = $usuario->senha;

        // Remover espaços em branco (incluindo novas linhas) do hash
        $senha = trim($senha);
        
        // Verificar se o email corresponde ao usuário na linha
        if ($emailFornecido == $email) {
            $encontrado = true;
            // Verificar se a senha fornecida corresponde ao hash armazenado
            if (password_verify($senhaFornecida, $senha)==true) {
                // Login bem-sucedido, redirecione para a página de boas-vindas
                header("Location: sucesso.html");
                exit();
            } else {
                // Senha incorreta
                header("Location: login.html");
                break;
            }
        }

    }
    // Se encontrado ainda for falso, o email não foi encontrado
    if (!$encontrado) {
        header("Location: login.html");
        exit();
    }
}

?>