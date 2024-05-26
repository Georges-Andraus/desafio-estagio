<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clinica */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Clínicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clinica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir esta clínica?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cnpj',
        ],
    ]) ?>

    <h2>Profissionais</h2>
    <ul>
        <?php foreach ($model->profissionais as $profissional): ?>
            <li>
                <?= Html::encode($profissional->nome) ?>
                <?= Html::a('Excluir', ['profissional/delete', 'id' => $profissional->id], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                        'confirm' => 'Você tem certeza que deseja excluir este profissional?',
                        'method' => 'post',
                    ],
                ]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
