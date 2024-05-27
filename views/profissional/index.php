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
        <?= Html::a('Create Profissional', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Criar Clínica', ['clinica/create'], ['class' => 'btn btn-primary']) ?> <!-- Botão para criar clínica -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'conselho',
            'nome',
            'numero_conselho',
            [
                'attribute' => 'nascimento',
                'value' => function($model) {
                    return Yii::$app->formatter->asDate($model->nascimento, 'dd-MM-yyyy');
                },
            ],
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return $model->status ? 'Ativo' : 'Inativo';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'template' => '{view} {update} {delete}', // Adicionando template para definir as ações desejadas
            ],
        ],
    ]); ?>


</div>
