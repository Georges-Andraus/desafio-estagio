<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClinicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clínicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinica-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Clínica', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar para profissinais', ['profissional/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'cnpj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
