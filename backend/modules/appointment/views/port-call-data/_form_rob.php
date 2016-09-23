<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallDataRob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="port-call-data-rob-form form-inline">

    <?php $form = ActiveForm::begin(['action' => '/emperor/backend/web/appointment/port-call-data-rob/update/?id=' . $model->id]); ?>

    <?php //$form->field($model, 'appointment_id')->textInput(['readonly' => true, 'value' => $model->appointment->appointment_no]) ?>
    <div class="form-group "><h4 class="portcall"><b><u>ROB- ARRIVAL</u></b></h4></div>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <div class="form-group "><h4 class="portcall"><b><u>ROB- SAILING</u></b></h4></div>
    <div class="form-group "></div>

    <?php $arr = array('1' => 'Metric Ton', '2' => 'Litter'); ?>

    <?= $form->field($model, 'fo_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-']) ?>

    <?= $form->field($model, 'fo_arrival_quantity')->textInput() ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'fo_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-']) ?>

    <?= $form->field($model, 'fo_sailing_quantity')->textInput() ?>


    <?= $form->field($model, 'do_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-']) ?>

    <?= $form->field($model, 'do_arrival_quantity')->textInput() ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'do_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-']) ?>

    <?= $form->field($model, 'do_sailing_quantity')->textInput() ?>

    <?= $form->field($model, 'go_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-']) ?>

    <?= $form->field($model, 'go_arrival_quantity')->textInput() ?>
    
    <div class="form-group "></div>
    
    <?= $form->field($model, 'go_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-']) ?>

    <?= $form->field($model, 'go_sailing_quantity')->textInput() ?>

    <?= $form->field($model, 'lo_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-']) ?>

    <?= $form->field($model, 'lo_arrival_quantity')->textInput() ?>
    
    <div class="form-group "></div>
    
    <?= $form->field($model, 'lo_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-']) ?>

    <?= $form->field($model, 'lo_sailing_quantity')->textInput() ?>

    <?= $form->field($model, 'fresh_water_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-']) ?>

    <?= $form->field($model, 'fresh_water_arrival_quantity')->textInput() ?>

    <div class="form-group "></div>
    <?= $form->field($model, 'fresh_water_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-']) ?>

    <?= $form->field($model, 'fresh_water_sailing_quantity')->textInput() ?>
    
<!--    <?echo $form->field($model, 'additional_info')->textInput() ?>

    <?echo $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?echo $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>-->


    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
