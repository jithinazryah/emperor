<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallData */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="port-call-data-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'appointment_id')->textInput(['readonly' => true, 'value' => $model->appointment->appointment_no]) ?>

    <?= $form->field($model, 'eta')->textInput(['tabindex' => 1]) ?>

    <?= $form->field($model, 'dropped_anchor')->textInput(['tabindex' => 6]) ?>

    <?= $form->field($model, 'all_fast')->textInput(['tabindex' => 11]) ?>

    <?= $form->field($model, 'cargo_commenced')->textInput(['tabindex' => 16]) ?>

    <?= $form->field($model, 'cleared_channel')->textInput(['tabindex' => 20]) ?>

    <?= $form->field($model, 'ets')->textInput(['tabindex' => 2]) ?>

    <?= $form->field($model, 'anchor_aweigh')->textInput(['tabindex' => 7]) ?>

    <?= $form->field($model, 'gangway_down')->textInput(['tabindex' => 12]) ?>

    <?= $form->field($model, 'cargo_completed')->textInput(['tabindex' => 17]) ?>

    <?= $form->field($model, 'cosp')->textInput(['tabindex' => 21]) ?>

    <?= $form->field($model, 'eosp')->textInput(['tabindex' => 3]) ?>

    <?= $form->field($model, 'arrived_pilot_station')->textInput(['tabindex' => 8]) ?>

    <?= $form->field($model, 'agent_on_board')->textInput(['tabindex' => 13]) ?>

    <?= $form->field($model, 'pob_outbound')->textInput(['tabindex' => 18]) ?>

    <?= $form->field($model, 'fasop')->textInput(['tabindex' => 22]) ?>

    <?= $form->field($model, 'arrived_anchorage')->textInput(['tabindex' => 4]) ?>

    <?= $form->field($model, 'pob_inbound')->textInput(['tabindex' => 9]) ?>

    <?= $form->field($model, 'immigration_commenced')->textInput(['tabindex' => 14]) ?>

    <div class="form-group "></div>
    <?= $form->field($model, 'eta_next_port')->textInput(['tabindex' => 23]) ?>

    <?= $form->field($model, 'nor_tendered')->textInput(['tabindex' => 5]) ?>

    <?= $form->field($model, 'first_line_ashore')->textInput(['tabindex' => 10]) ?>

    <?= $form->field($model, 'immigartion_completed')->textInput(['tabindex' => 15]) ?>

    <?= $form->field($model, 'lastline_away')->textInput(['tabindex' => 19]) ?>
    
    <div class="form-group "></div>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled', 'tabindex' => 24]) ?>
    
    <?= $form->field($model, 'comments')->textarea(['rows' => 6, 'tabindex' => 25]) ?>
    
    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <style>
        .form-inline .form-group {
            width: 16% !important;
            margin-left: 30px;
            margin-bottom: 22px;
        }
        .portcall{
            color:#0f68a6;
        }
    </style>
</div>
