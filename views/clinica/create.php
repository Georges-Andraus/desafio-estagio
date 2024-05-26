<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clinica */

$this->title = 'Criar Clínica';
$this->params['breadcrumbs'][] = ['label' => 'Clínicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clinica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

