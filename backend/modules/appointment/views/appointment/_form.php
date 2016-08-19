<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\VesselType;
use common\models\Vessel;
use common\models\Ports;
use common\models\Terminal;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vessel_type')->dropDownList(ArrayHelper::map(VesselType::findAll(['status' => 1]), 'id', 'vessel_type'), ['prompt' => '-Choose a Vessel Type-']) ?>

    <?= $form->field($model, 'vessel')->dropDownList(ArrayHelper::map(Vessel::findAll(['status' => 1]), 'id', 'vessel_name'), ['prompt' => '-Choose a Vessel-']) ?>

    <?= $form->field($model, 'port_of_call')->dropDownList(ArrayHelper::map(Ports::findAll(['status' => 1]), 'id', 'port_name'), ['prompt' => '-Choose a Port-']) ?>

    <?= $form->field($model, 'terminal')->dropDownList(ArrayHelper::map(Terminal::findAll(['status' => 1]), 'id', 'terminal'), ['prompt' => '-Choose a Terminal-']) ?>

    <?= $form->field($model, 'birth_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appointment_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'principal')->textInput() ?>

    <?= $form->field($model, 'nominator')->textInput() ?>

    <?= $form->field($model, 'charterer')->textInput() ?>

    <?= $form->field($model, 'shipper')->textInput() ?>

    <?= $form->field($model, 'purpose')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'next_port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eta')->textInput() ?>

    <?= $form->field($model, 'stage')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
    $this->registerJs('
 $(".gender").change(function(){
    
 }
});


    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

