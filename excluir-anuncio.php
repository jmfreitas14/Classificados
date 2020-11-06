<?php
require 'pages/config.php';

if (empty($_SESSION['cLogin'])) {
    header('Location: login.php');
    exit;
}
require 'classes/anuncios.php';
$a = new anuncios();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $a->excluirAnuncio($_GET['id']);
}
header('Location: meus-anuncios.php');
