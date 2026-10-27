<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: 15d_login.php");
    exit();
}

$cor = $_SESSION['cor'] ?? 'branco';

$mapa_cores = [
    'verde'     => '#86efac',
    'amarelo'   => '#fde047',
    'roxo'      => '#7e22ce',
    'vermelho'  => '#ef4444',
    'azul-claro'=> '#93c5fd',
    'preto'     => '#18181b',
    'rosa'      => '#f472b6',
    'cinza'     => '#808080',
    'marrom'    => '#78350f',
'azul-escuro'   => '#1e40af',
    'branco'    => '#ffffff',
    'laranja'   => '#f97316'
];

$bg_color = $mapa_cores[$cor] ?? '#ffff';
?>