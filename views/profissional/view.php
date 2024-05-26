<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Profissionais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profissional-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que deseja excluir este profissional?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Criar Clínica', ['clinica/create', 'profissional_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'email:email',
            'conselho',
            'numero_conselho',
            'nascimento',
            [
                'attribute' => 'status',
                'value' => $model->status ? 'Ativo' : 'Inativo',
            ],
        ],
    ]) ?>

    <h2>Clínicas Associadas</h2>
    <ul>
        <?php foreach ($model->clinicas as $clinica): ?>
            <li>
                <?= Html::encode($clinica->nome) ?>
                <?= Html::a('Excluir', ['profissional/delete-clinica', 'id' => $model->id, 'clinica_id' => $clinica->id], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                        'confirm' => 'Você tem certeza que deseja excluir esta clínica associada a este profissional?',
                        'method' => 'post',
                    ],
                ]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
