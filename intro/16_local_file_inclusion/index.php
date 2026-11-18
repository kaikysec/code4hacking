<?php

$arquivos = scandir('./notas');
$arquivos = array_splice($arquivos, 2);

if (isset($_GET['filename'])) {
    // /?filename=anotacao_1234.txt


    //vulneravel - ao inves de ler o arquivo estamos fazendo um require ENVIANDO um arquivo para o servidor
    // um atacante consegue enviar codigo malicioso

    $filename = $_GET['filename'];
    $file_path = "./notas/{$filename}";

    require $file_path; // usando include para ler arquivo
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $random_number = rand(1000, 9999);

    $texto_da_nota = $_POST['note'];
    $file_path = "./notas/anotacao_{$random_number}.txt";

    // Quebra de linha
    $texto_da_nota = $texto_da_nota . "\n";
    // File put contents é pra escrever o conteúdo em um arquivo, se existir só atualiza, se não cria e insere o conteúdo
    // FILE_APPEND - adicionar conteudo ao invés de sobreescrever
    file_put_contents($file_path, $texto_da_nota, FILE_APPEND);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write notes</title>
</head>
<body>
    <div>
        <h2>Notas salvas:</h2>
        <ul>
            <?php foreach ($arquivos as $arquivo): ?>
                <li>
                    <a href="/index.php?filename=<?= $arquivo ?>">
                        <?= $arquivo ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <form action="/index.php" method="POST">
        <label for="note">Escreva sua nota:</label><br>
        <textarea id="note" name="note" rows="4" cols="50"></textarea><br>
        <button type="submit">Salvar Nota</button>
    </form>    
</body>
</html>