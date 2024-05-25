<?php
/** @var yii\web\View $this */

$this->title = 'Cadastro de Profissionais de Saúde';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>
    <style>
        /* Estilos para o fundo degradê animado */
        body {
            background: linear-gradient(to right, #00FA9A, #008B8B); /* Verde escuro para verde claro */
            animation: gradientAnimation 10s infinite alternate;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        /* Estilos para o conteúdo da página */
        .container {
            margin-top: 100px;
            text-align: center;
            color: #fff;
        }

        h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .btn {
            font-size: 24px;
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bem-vindo ao Cadastro de Profissionais de Saúde</h1>
    <p>Aqui você pode cadastrar e gerenciar profissionais de saúde.</p>
    <a class="btn" href="<?= Yii::$app->urlManager->createUrl(['/profissional/index']) ?>">Comece agora</a>

</div>
</body>
</html>
