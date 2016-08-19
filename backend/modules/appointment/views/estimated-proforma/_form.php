<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EstimatedProforma */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estimated-proforma-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apponitment_id')->textInput() ?>

    <?= $form->field($model, 'service_id')->textInput() ?>

    <?= $form->field($model, 'supplier')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput() ?>

    <?= $form->field($model, 'unit_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'roe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epda')->textInput() ?>

    <?= $form->field($model, 'invoice_type')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'CB')->textInput() ?>

    <?= $form->field($model, 'UB')->textInput() ?>

    <?= $form->field($model, 'DOC')->textInput() ?>

    <?= $form->field($model, 'DOU')->textInput() ?>

    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
