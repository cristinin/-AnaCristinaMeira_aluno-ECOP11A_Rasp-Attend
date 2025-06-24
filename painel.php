<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel de Presenças</title>
    <link rel="stylesheet" href="stylephp.css">
    <style>
        .container {
            max-width: 500px;
            margin: 50px auto;
            text-align: center;
        }
        h1 {
             color: #c779d0;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestor de Presença - Event Horizon</h1>
        <p>Baixe a lista de presenças atualizada.</p>
        <form action="download.php" method="get">
            <button type="submit" class="button">📥 Baixar Lista de Presença</button>
        </form>
        <br>
        <a href="index.html" class="button" style="background-color: #008CBA;">⬅️ Voltar para o Formulário</a>
    </div>
</body>
</html>
