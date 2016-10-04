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

    <div><a class="portcall">If Immigration Clearance Applicable</a></div>
    <!--    <div class="form-group "></div>
        <div class="form-group "></div>
        <div class="form-group "></div>
        <div class="form-group "></div>-->
    <?php
    //var_dump($model->appointment_id);exit;
    ?>
    <div class="row hidediv">
        <div class="col-md-12">
            <?= $form->field($model_imigration, 'arrived_ps')->textInput() ?>

            <?= $form->field($model_imigration, 'pob_inbound')->textInput() ?>

            <?= $form->field($model_imigration, 'first_line_ashore')->textInput() ?>

            <?= $form->field($model_imigration, 'all_fast')->textInput() ?>

            <?= $form->field($model_imigration, 'agent_on_board')->textInput() ?>

            <?= $form->field($model_imigration, 'imi_clearence_commenced')->textInput() ?>

            <?= $form->field($model_imigration, 'imi_clearence_completed')->textInput() ?>

            <?= $form->field($model_imigration, 'pob_outbound')->textInput() ?>

            <?= $form->field($model_imigration, 'cast_off')->textInput() ?>

            <?= $form->field($model_imigration, 'last_line_away')->textInput() ?>

            <?= $form->field($model_imigration, 'cleared_break_water')->textInput() ?>

            <?= $form->field($model_imigration, 'drop_anchor')->textInput() ?>

            <?= $form->field($model_imigration, 'heave_up_anchor')->textInput() ?>

            <?= $form->field($model_imigration, 'pilot_boarded')->textInput() ?>
        </div>
    </div>
    <hr class="appoint_history" />
    <div class="row">
        <div class="col-md-2 eosp">
            <?= $form->field($model, 'eta')->textInput(['tabindex' => 1]) ?>
            <br/>
            <?= $form->field($model, 'ets')->textInput(['tabindex' => 2]) ?>
            <br/>
            <?= $form->field($model, 'eosp')->textInput(['tabindex' => 3]) ?>
            <br/>
            <?= $form->field($model, 'arrived_anchorage')->textInput(['tabindex' => 4]) ?>
            <br/>
            <?= $form->field($model, 'nor_tendered')->textInput(['tabindex' => 5]) ?>  
        </div>
        <div class="col-md-10">
            <?php
            if ($model_appointment->port_of_call == 2 || $model_appointment->port_of_call == 3) {
                if ($model_appointment->purpose == 2 && $model_appointment->port_of_call == 2) {
                    //$var = "_form_rmc_tanker";
                    echo $this->render('_form_rmc_tanker', [
                        'model' => $model,
                        'form' => $form,
                    ]);
                } else {
                    //$var = "_form_stevin_rocks";
                    echo $this->render('_form_stevin_rocks', [
                        'model' => $model,
                        'form' => $form,
                    ]);
                }
            } else {
                //$var = "_form_common";
                echo $this->render('_form_common', [
                    'model' => $model,
                    'form' => $form,
                ]);
            }
            ?>
        </div>
    </div>

    <hr class="appoint_history" />
    <div id="p_scents">
        <span>
            <div class="form-group">
                <label class="control-label">Label</label>
                <input type="text" class="form-control" name="1[label][]">
            </div>
            <div class="form-group ">
                <label class="control-label" for="">Value</label>
                <input type="text" class="form-control" name="1[valuee][]">
            </div>
            <div class="form-group">
                <label class="control-label" >Comment</label>
                <input type="text" class="form-control" name="1[comment][]">
            </div>
        </span>
        <br/>
    </div>



    <div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
    </div>
    <div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
    </div>
    <div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
    </div>
    <div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
        <a id="addScnt" class="btn btn-icon btn-blue addScnt" ><i class="fa-plus"></i></a>
<!--        <button id="addScnt" class="btn btn-icon btn-blue"  ><i class="fa-plus"></i></button>-->
    </div><br/>
    <hr class="appoint_history" />

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled', 'tabindex' => 24]) ?>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <div class="form-group "></div>
    <br/>
    <?= Html::activeTextarea($model, 'comments', ['class' => 'newsletter-cta-mail txtarea', 'tabindex' => 25]); ?>
    <?php // $form->field($model, 'comments', ['template' => "<div class='full-width-text'>\n{label}\n{input}\n{hint}\n{error}\n</div>"])->textarea(['rows' => 6, 'tabindex' => 25]) ?>
    <br/>
    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <style>
        .form-inline .form-group {
            width: 16%;
            margin-left: 30px;
            margin-bottom: 22px;
        }
        .form-inline .eosp .form-group {
            width: 100%;
        }
        .portcall{
            color:#09a2dc;
            font-size: 20px;
            margin-left: 31px;
            margin-bottom: 12px;
            cursor: pointer;
            text-decoration: underline;
        }
        .nav.nav-tabs+.tab-content {
            background-color: #b9c7a7 !important;
            padding: 30px;
            margin-bottom: 30px;
        }
        .form-control {
            width: 100% !important;
            font-weight: bold !important;
        }
        .nav.nav-tabs>li.active>a {
            background-color: #b9c7a7;
        }
        .txtarea{
            width:1220px !important;
            margin-left: 28px;
            height: 150px;
        }
        .hidediv{
            display:none;
        }
    </style>
</div>
<script>
    $(document).ready(function () {
        /*
         * Add more bnutton function
         */
        var scntDiv = $('#p_scents');
        var i = $('#p_scents span').size() + 1;

        $('#addScnt').on('click', function () {
            var ver = '<span>\n\
                                <div class="form-group">\n\
                                <label class="control-label" for=""></label>\n\
                                <input type="text" id="" class="form-control" name="1[label][]">\n\
                                </div> \n\
                                <div class="form-group">\n\
                                <label class="control-label" for=""></label>\n\
                                <input type="text" class="form-control" name="1[valuee][]">\n\
                                </div> \n\
                                <div class="form-group ">\n\
                                <label class="control-label"></label>\n\
                                <input type="text" id="" class="form-control" name="1[comment][]">\n\
                                </div>\n\
                                <div class="form-group">\n\
                                <a id="remScnt" class="btn btn-icon btn-red remScnt" ><i class="fa-remove"></i></a>\n\
                                 </div><br/>\n\
                                </span>';


            $(ver).appendTo(scntDiv);
            i++;
            return false;
        });
        $('#p_scents').on('click', '.remScnt', function () {
            if (i > 2) {
                $(this).parents('span').remove();
                i--;
            }
            return false;
        });
        $('.portcall').click(function () {
            $('.hidediv').slideToggle();
        });
    });
</script>
