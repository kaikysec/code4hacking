<?php

// Vulnerabilidade de Local File Read
// Path Traversal - Nome de uma técnica de voltar diretório e ler arquivos, é uma técnica a vulnerabilidade é a local file read

if (!isset($_GET['filename'])) {
    echo "Por favor insira o filename na query string";
    die();
}

$filename = $_GET['filename'];

if (!file_exists($filename)) {
    echo "Arquivo nao encontrado";
    die();
}

// aceita tanto caminhos de arquivos, nome de arquivos e URL/
$content = file_get_contents($filename);

echo $content;