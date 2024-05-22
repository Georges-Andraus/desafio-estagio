<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h2>Cadastro do profissional</h2>
<hr>

<?php $form = ActiveForm::begin([
    'id' => 'cadastro-form',
    'options' => ['onsubmit' => 'return confirmSubmit()'],
]); ?>

<?= $form->field($model, 'id')->textInput() ?>
<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'conselho')->dropDownList([
    'CRM' => 'CRM',
    'CRO' => 'CRO',
    'CRN' => 'CRN',
    'COREN' => 'COREN',
], ['prompt' => 'Selecione um conselho']) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

