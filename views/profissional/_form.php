<?php
use yii\helpers\ArrayHelper;
use app\models\Clinica;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profissional */
/* @var $form yii\widgets\ActiveForm */

$clinicas = ArrayHelper::map(Clinica::find()->all(), 'id', 'nome');

?>

<div class="profissional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conselho')->dropDownList(['CRM' => 'CRM', 'CRO' => 'CRO', 'CRN' => 'CRN', 'COREN' => 'COREN'], ['prompt' => 'Selecione o Conselho']) ?>

    <?= $form->field($model, 'numero_conselho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nascimento')->input('date') ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'clinicas')->listBox($clinicas, ['multiple' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
