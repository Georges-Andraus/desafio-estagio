<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Profissional $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profissional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'conselho')->dropDownList(['CRN' => 'CRN', 'CRM' => 'CRM', 'CRO' => 'CRO' , 'COREN' => 'COREN'],['prompt' => 'Selecione o Conselho'])  ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_conselho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nascimento')->input('date') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <label>Status</label>
        <div>
            <?= Html::checkbox('active_checkbox', $model->status == 1, ['label' => 'Ativo', 'onclick' => 'toggleStatus(1)']) ?>
            <?= Html::checkbox('inactive_checkbox', $model->status == 0, ['label' => 'Inativo', 'onclick' => 'toggleStatus(0)']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function toggleStatus(value) {
        document.getElementById("profissional-status").value = value;
        document.querySelector('input[name="active_checkbox"]').checked = (value == 1);
        document.querySelector('input[name="inactive_checkbox"]').checked = (value == 0);
    }
</script>