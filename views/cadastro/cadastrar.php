<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h2>Cadastro do profissional</h2>
<hr>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'conselho')->dropDownList([
    'CRM' => 'CRM',
    'CRO' => 'CRO',
    'CRN' => 'CRN',
    'COREN' => 'COREN',
], ['prompt' => 'Selecione um conselho']) ?>
<?= $form->field($model, 'numero_conselho')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'nascimento')->input('date') ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'ativo')->checkbox() ?>

<div class="form-group">
    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
    function confirmSubmit() {
        return confirm("Você tem certeza que deseja cadastrar este profissional?");
    }
</script>
