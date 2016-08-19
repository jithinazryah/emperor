<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\VesselType;
use common\models\Vessel;
use common\models\Ports;
use common\models\Terminal;
use common\models\Debtor;
use common\models\Contacts;
use common\models\Purpose;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form form-inline">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vessel_type')->dropDownList(ArrayHelper::map(VesselType::findAll(['status' => 1]), 'id', 'vessel_type'), ['prompt' => '-Choose a Vessel Type-']) ?>

    <?= $form->field($model, 'vessel')->dropDownList(ArrayHelper::map(Vessel::findAll(['status' => 1]), 'id', 'vessel_name'), ['prompt' => '-Choose a Vessel-']) ?>

    <?= $form->field($model, 'port_of_call')->dropDownList(ArrayHelper::map(Ports::findAll(['status' => 1]), 'id', 'port_name'), ['prompt' => '-Choose a Port-', 'class' => 'form-control ports']) ?>

    <?= $form->field($model, 'terminal')->dropDownList(ArrayHelper::map(Terminal::findAll(['status' => 1]), 'id', 'terminal'), ['prompt' => '-Choose a Terminal-']) ?>

    <?= $form->field($model, 'birth_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appointment_no')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'no_of_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'principal')->dropDownList(ArrayHelper::map(Debtor::findAll(['status' => 1]), 'id', 'principal_name'), ['prompt' => '-Choose a Principal-']) ?>

    <?= $form->field($model, 'nominator')->dropDownList(ArrayHelper::map(Contacts::findAll(['status' => 1]), 'id', 'name'), ['prompt' => '-Choose a Nominator-']) ?>

    <?= $form->field($model, 'charterer')->dropDownList(ArrayHelper::map(Contacts::findAll(['status' => 1]), 'id', 'name'), ['prompt' => '-Choose a Charterer-']) ?>

    <?= $form->field($model, 'shipper')->dropDownList(ArrayHelper::map(Contacts::findAll(['status' => 1]), 'id', 'name'), ['prompt' => '-Choose a Shipper-']) ?>

    <?= $form->field($model, 'purpose')->dropDownList(ArrayHelper::map(Purpose::findAll(['status' => 1]), 'id', 'purpose'), ['prompt' => '-Choose a Purpose-']) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'next_port')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'eta')->textInput() ?>

    <?php //$form->field($model, 'stage')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>

    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $("document").ready(function () {
        $('.ports').change(function () {
            var port_id =  $(this).val();
            $.ajax({
                type: 'POST',
                cache: false,
                data: { port_id: port_id },
                url: '<?= Yii::$app->homeUrl ;?>/appointment/appointment/appointment-no',
                success: function (data) {
                    $('#appointment-appointment_no').val(data);
                }
            });
        });

    });
</script>

