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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'email',
            'conselho',
            'numero_conselho',
            'nascimento',
            [
                'attribute' => 'status',
                'value' => function($model) {
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



</div>
