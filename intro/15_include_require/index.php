<?php

/**
 * Separar arquivos de código
 */

$pages_folder = "./pages";

if (!isset($_GET['p'])) {
    echo "Nenhuma pagina selecionada";
    exit;
}

$page = $_GET['p'];

require "{$pages_folder}/{$page}.php";

