<?php
date_default_timezone_set('America/Sao_Paulo'); // Fuso horário de Brasília

$filePath = '/var/www/html/presencas.txt';

// Obtém os IPs atualmente conectados (baseado no DHCP leases ou ARP)
$ipsAtivos = [];
exec("arp -n | awk '/ether/ {print \$1}'", $ipsAtivos);

if (file_exists($filePath)) {
    $linhas = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $novasLinhas = [];

    foreach ($linhas as $linha) {
        // Verifica se a linha ainda está com status "Conectado"
        if (strpos($linha, 'Status: Conectado') !== false) {
            // Extrai o IP da linha
            preg_match('/IP: ([^ |]+)/', $linha, $matches);
            $ipLinha = $matches[1] ?? '';

            // Se o IP não estiver mais ativo, marca como desconectado
            if (!in_array($ipLinha, $ipsAtivos)) {
                $dataHoraSaida = date('d/m/Y H:i:s'); // Data/hora de saída no formato brasileiro
                $linha = str_replace('Status: Conectado | Data/Hora de Saída: ---', "Status: Desconectado | Data/Hora de Saída: $dataHoraSaida", $linha);
            }
        }
        $novasLinhas[] = $linha;
    }

    // Salva o arquivo atualizado
    file_put_contents($filePath, implode("\n", $novasLinhas));
}

echo "Verificação de desconectados realizada com sucesso!";
?>
