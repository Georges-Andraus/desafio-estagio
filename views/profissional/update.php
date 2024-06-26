<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */

$this->title = 'Update Profissional: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profissionals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profissional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
