<?php
    require_once 'conexao.php';

    if (!isset($_SESSION['email']) || $_SESSION['email'] !== true) {
        header('Location: login.html');
        exit;
    }