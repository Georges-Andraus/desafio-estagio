<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Sobre a aplicação';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>
    <style>
        /* Estilos para o fundo degradê animado */
        body {
            background: linear-gradient(to right, #5F9EA0, #00FA9A); /* Verde escuro para verde claro */
            animation: gradientAnimation 10s infinite alternate;
            margin: 0;
            padding: 0;
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
        .site-about {
            text-align: center;
            color: #fff;
            padding: 50px;
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

        code {
            display: block;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Aplicação de um CRUD básico que faz cadastros de profissionais da saúde. Até agora minha aplicação
        possui a página "home" que já oferece diretamente a opção de cadastrar o profissional clicando no
        botão "comece agora". Ao clicar, o usuário é redirecionado para a aba responsável por fazer o cadastro
        em si. Finalizado o cadastro, as informações do profissional serão salvas em um banco de dados no MySQL,
        além disso, será possível visualizar, deletar ou atualizar os dados dos profissionais já cadastrados.
        Além disso, agora podemos criar clínicas assim como criamos profissionais e relacionar essas duas entidades
        sendo mostrado todas as informações na grade de visualização do profissional.
    </p>

</div>
</body>
</html>
