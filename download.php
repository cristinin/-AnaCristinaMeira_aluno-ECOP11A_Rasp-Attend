<?php
$filePath = '/var/www/html/presencas.txt';

if (file_exists($filePath)) {
    // Lê o conteúdo do arquivo
    $linhas = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Ordena por nome (buscando o campo "Nome: ...")
    usort($linhas, function($a, $b) {
        preg_match('/Nome: ([^|]+)/', $a, $matchA);
        preg_match('/Nome: ([^|]+)/', $b, $matchB);
        return strcmp(trim($matchA[1] ?? ''), trim($matchB[1] ?? ''));
    });

    // Prepara o conteúdo final ordenado
    $conteudoOrdenado = implode("\n", $linhas);

    // Força o download
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="presencas_ordenadas.txt"');
    header('Content-Length: ' . strlen($conteudoOrdenado));

    echo $conteudoOrdenado;
    exit;
} else {
    echo "Nenhuma presença registrada ainda.";
}
?>
