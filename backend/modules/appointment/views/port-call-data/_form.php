<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallData */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="port-call-data-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appointment_id')->textInput(['readonly' => true, 'value' => $appointment->appointment_no]) ?>

    <?= $form->field($model, 'eta')->textInput() ?>

    <?= $form->field($model, 'ets')->textInput() ?>

    <?= $form->field($model, 'eosp')->textInput() ?>

    <?= $form->field($model, 'arrived_anchorage')->textInput() ?>

    <?= $form->field($model, 'nor_tendered')->textInput() ?>

    <?= $form->field($model, 'dropped_anchor')->textInput() ?>

    <?= $form->field($model, 'anchor_aweigh')->textInput() ?>

    <?= $form->field($model, 'arrived_pilot_station')->textInput() ?>

    <?= $form->field($model, 'pob_inbound')->textInput() ?>

    <?= $form->field($model, 'first_line_ashore')->textInput() ?>

    <?= $form->field($model, 'all_fast')->textInput() ?>

    <?= $form->field($model, 'gangway_down')->textInput() ?>

    <?= $form->field($model, 'agent_on_board')->textInput() ?>

    <?= $form->field($model, 'immigration_commenced')->textInput() ?>

    <?= $form->field($model, 'immigartion_completed')->textInput() ?>

    <?= $form->field($model, 'cargo_commenced')->textInput() ?>

    <?= $form->field($model, 'cargo_completed')->textInput() ?>

    <?= $form->field($model, 'pob_outbound')->textInput() ?>

    <?= $form->field($model, 'lastline_away')->textInput() ?>

    <?= $form->field($model, 'cleared_channel')->textInput() ?>

    <?= $form->field($model, 'cosp')->textInput() ?>

    <?= $form->field($model, 'fasop')->textInput() ?>

    <?= $form->field($model, 'eta_next_port')->textInput() ?>

    <?= $form->field($model, 'additional_info')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>


    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
