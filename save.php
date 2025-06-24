<?php 
date_default_timezone_set('America/Sao_Paulo'); // Fuso horário de Brasília

$filePath = '/var/www/html/presencas.txt';

$nome = isset($_POST['nome']) ? htmlspecialchars(trim($_POST['nome'])) : '';
$matricula = isset($_POST['matricula']) ? htmlspecialchars(trim($_POST['matricula'])) : '';
$dataHoraEntrada = date('d/m/Y H:i:s'); // Formato brasileiro

// Função para validar matrícula
function validarMatricula($matricula) {
    return preg_match('/^[0-9]{10}$/', $matricula) &&
           substr($matricula, 0, 4) >= 2013 &&
           substr($matricula, 0, 4) <= 2025;
}

// Capturar IP
$ipAluno = $_SERVER['REMOTE_ADDR'];

// Capturar MAC (se disponível na tabela ARP)
$macAluno = trim(shell_exec("arp -n $ipAluno | awk '{print \$3}'"));
if (empty($macAluno) || $macAluno == "(incomplete)") {
    $macAluno = "Desconhecido";
}

// Se for o professor, redireciona pro painel.php
if ($nome === "admin" && $matricula === "0000000000") {
    header("Location: painel.php");
    exit;
}

// Se for aluno
if (!empty($nome) && !empty($matricula)) {
    if (!validarMatricula($matricula)) {
        $mensagem = "<h2>Erro na matrícula!</h2><p>A matrícula deve ter 10 dígitos, começar com um ano entre 2013 e 2025, e conter apenas números.</p>";
    } else {
        // Formato padronizado da linha no presencas.txt
        $linha = "Data/Hora de Entrada: $dataHoraEntrada | Nome: $nome | Matrícula: $matricula | IP: $ipAluno | MAC: $macAluno | Status: Conectado | Data/Hora de Saída: ---\n";
        file_put_contents($filePath, $linha, FILE_APPEND);

        $mensagem = "<h2>Presença registrada!</h2><p>Agora você tem acesso à internet.</p>";
    }
} else {
    $mensagem = "<h2>Erro: Campos inválidos.</h2><p>Por favor, preencha todos os campos corretamente.</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Presença</title>
    <link rel="stylesheet" href="stylephp.css">
</head>
<body>
    <div class="container">
        <?php echo $mensagem; ?>
        <a href="index.html">Voltar</a>
    </div>
</body>
</html>
