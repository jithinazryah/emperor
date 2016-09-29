<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PortCallDataAdditional;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallDataRob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="port-call-data-rob-form form-inline">

    <?php $form = ActiveForm::begin(['action' => '/emperor/backend/web/appointment/port-call-data/update-rob/?id=' . $model->appointment_id]); ?>

    <?php //$form->field($model, 'appointment_id')->textInput(['readonly' => true, 'value' => $model->appointment->appointment_no]) ?>
    <div class="form-group "><h4 class="portcall"><b><u>ROB- ARRIVAL</u></b></h4></div>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <div class="form-group "><h4 class="portcall"><b><u>ROB- SAILING</u></b></h4></div>
    <div class="form-group "></div>

    <?php $arr = array('1' => 'Metric Ton', '2' => 'Litter'); ?>

    <?= $form->field($model, 'fo_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-', 'tabindex' => 1]) ?>

    <?= $form->field($model, 'fo_arrival_quantity')->textInput(['tabindex' => 6, 'class' => 'decimal form-control']) ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'fo_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-', 'tabindex' => 11]) ?>

    <?= $form->field($model, 'fo_sailing_quantity')->textInput(['tabindex' => 16, 'class' => 'decimal form-control']) ?>


    <?= $form->field($model, 'do_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-', 'tabindex' => 2]) ?>

    <?= $form->field($model, 'do_arrival_quantity')->textInput(['tabindex' => 7, 'class' => 'decimal form-control']) ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'do_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-', 'tabindex' => 12]) ?>

    <?= $form->field($model, 'do_sailing_quantity')->textInput(['tabindex' => 17, 'class' => 'decimal form-control']) ?>

    <?= $form->field($model, 'go_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-', 'tabindex' => 3]) ?>

    <?= $form->field($model, 'go_arrival_quantity')->textInput(['tabindex' => 8, 'class' => 'decimal form-control']) ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'go_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-', 'tabindex' => 13]) ?>

    <?= $form->field($model, 'go_sailing_quantity')->textInput(['tabindex' => 18, 'class' => 'decimal form-control']) ?>

    <?= $form->field($model, 'lo_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-', 'tabindex' => 4]) ?>

    <?= $form->field($model, 'lo_arrival_quantity')->textInput(['tabindex' => 9, 'class' => 'decimal form-control']) ?>

    <div class="form-group "></div>

    <?= $form->field($model, 'lo_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-', 'tabindex' => 14]) ?>

    <?= $form->field($model, 'lo_sailing_quantity')->textInput(['tabindex' => 19, 'class' => 'decimal form-control']) ?>

    <?= $form->field($model, 'fresh_water_arrival_unit')->dropDownList($arr, ['prompt' => '-choose arrival unit-', 'tabindex' => 5]) ?>

    <?= $form->field($model, 'fresh_water_arrival_quantity')->textInput(['tabindex' => 10, 'class' => 'decimal form-control']) ?>

    <div class="form-group "></div>
    <?= $form->field($model, 'fresh_water_sailing_unit')->dropDownList($arr, ['prompt' => '-choose sailing unit-', 'tabindex' => 15]) ?>

    <?= $form->field($model, 'fresh_water_sailing_quantity')->textInput(['tabindex' => 20, 'class' => 'decimal form-control']) ?>
    <!--    <button class="btn btn-icon btn-blue add_field_button">
            <i class="fa-plus"></i>
        </button>-->










<!--    <?echo $form->field($model, 'additional_info')->textInput() ?>

<?echo $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

<?echo $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>-->


    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <style>
        .btstyle{
            margin-left: 431px;
        }
    </style>
</div>
<script>
        $(document).ready(function () {
            /*
             * To add decimal(.000) to the desired text fields
             */
            $('.decimal').blur(function () {
                var str = $(this).val();
                if (str != '') {
                    if (str.indexOf('.') === -1) {
                        $(this).val(str + '.000');
                    }
                }
            });





        });
</script>




