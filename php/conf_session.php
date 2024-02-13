<?php
// Defina o tempo de expiração em segundos
$session_lifetime = 3600;

// Configure o tempo de expiração da sessão
ini_set('session.gc_maxlifetime', $session_lifetime);

// Inicie a sessão
session_start();

// Verifique se a variável de sessão 'ultimo_acesso' existe
if (isset($_SESSION['ultimo_acesso'])) {
    // Calcule o tempo decorrido desde o último acesso
    $tempo_decorrido = time() - $_SESSION['ultimo_acesso'];

    // Verifique se o tempo decorrido é maior que o tempo de expiração da sessão
    if ($tempo_decorrido > $session_lifetime) {
        // Tempo de expiração atingido, destrua a sessão e redirecione o usuário
        error_log("Sessão expirada!"); // Adicione esta linha para logar quando a sessão expira
        session_unset();
        session_destroy();
        exit;
    }
}
// Atualize a variável de sessão 'ultimo_acesso' com o tempo atual
$_SESSION['ultimo_acesso'] = time();

if (!isset($_SESSION["email"]) || $_SESSION["email"] == "") {
    $retorno["status"] = "falha";
} else {
    $retorno["status"] = "sucesso";
}

echo json_encode($retorno);
?>