<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallDataDraft */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="port-call-data-draft-form form-inline">

    <?php $form = ActiveForm::begin(['action' => '/emperor/backend/web/appointment/port-call-data-draft/update/?id=' . $model->id]); ?>

    <?php //$form->field($model, 'appointment_id')->textInput(['readonly' => true, 'value' => $model->appointment->appointment_no]) ?>

    <?php //$form->field($model, 'data_id')->textInput() ?>
    <div class="form-group "><h4 class="portcall"><b><u>SURVEY TIMINGS</u></b></h4></div>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <div class="form-group "><h4 class="portcall"><b><u>DRAFT- ARRIVAL</u></b></h4></div>
    <div class="form-group "><h4 class="portcall"><b><u>DRAFT- SAILING</u></b></h4></div>
    <?= $form->field($model, 'intial_survey_commenced')->textInput() ?>

    <?= $form->field($model, 'finial_survey_commenced')->textInput() ?>
    <div class="form-group "></div>

    <?= $form->field($model, 'fwd_arrival_quantity')->textInput() ?>

    <?= $form->field($model, 'fwd_sailing_quantity')->textInput() ?>

    <?= $form->field($model, 'intial_survey_completed')->textInput() ?>

    <?= $form->field($model, 'finial_survey_completed')->textInput() ?>
    <div class="form-group "></div>

    <?= $form->field($model, 'aft_arrival_quantity')->textInput() ?>

    <?= $form->field($model, 'aft_sailing_quantity')->textInput() ?>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <div class="form-group "></div>

    <?= $form->field($model, 'mean_arrival_quantity')->textInput() ?>

    <?= $form->field($model, 'mean_sailing_quantity')->textInput() ?>



<!--    <?echo $form->field($model, 'fwd_arrival_unit')->textInput() ?>-->



<!--    <?echo $form->field($model, 'aft_arrival_unit')->textInput() ?>-->



    <!--<?echo $form->field($model, 'mean_arrival_unit')->textInput() ?>-->



<!--    <?echo $form->field($model, 'fwd_sailing_unit')->textInput() ?>-->



<!--    <?echo $form->field($model, 'aft_sailing_unit')->textInput() ?>-->



<!--    <?echo $form->field($model, 'mean_sailing_unit')->textInput() ?>-->



<!--    <?echo $form->field($model, 'additional_info')->textInput() ?>

    <?echo $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?echo $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>-->


    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <style>

    </style>
</div>
