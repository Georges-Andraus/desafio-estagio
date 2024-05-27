<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfissionalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profissionais';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profissional-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Profissional', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Criar Clínica', ['clinica/create'], ['class' => 'btn btn-primary']) ?> <!-- Botão para criar clínica -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered'], // Adicionando classes de estilo para a tabela
        'columns' => [
            // Removendo a coluna de serialização
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'email',
            'conselho',
            'numero_conselho',
            [
                'attribute' => 'nascimento',
                'value' => function ($model) {
                    return Yii::$app->formatter->asDate($model->nascimento, 'dd-MM-yyyy'); // Formatando a data
                }
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->status ? 'Ativo' : 'Inativo';
                }
            ],
            [
                'label' => 'Clínicas',
                'value' => function ($model) {
                    $clinicas = [];
                    foreach ($model->clinicas as $clinica) {
                        $clinicas[] = $clinica->nome;
                    }
                    return implode(', ', $clinicas);
                }
            ],
            // Coluna de ações
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:100px;'], // Definindo largura fixa para a coluna de ações
                'headerOptions' => ['style' => 'width:100px;'], // Definindo largura fixa para o cabeçalho da coluna de ações
            ],
        ],
    ]); ?>


</div>
