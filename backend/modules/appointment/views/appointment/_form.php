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
use yii\db\Expression;

/* @var $this yii\web\View */
/* @var $model common\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'vessel_type')->dropDownList(ArrayHelper::map(VesselType::findAll(['status' => 1]), 'id', 'vessel_type'), ['prompt' => '-Choose a Vessel Type-', 'class' => 'form-control vessels']) ?>

    <?= $form->field($model, 'vessel')->dropDownList(ArrayHelper::map(Vessel::findAll(['status' => 1]), 'id', 'vessel_name'), ['prompt' => '-Choose a Vessel-']) ?>

    <?= $form->field($model, 'port_of_call')->dropDownList(ArrayHelper::map(Ports::findAll(['status' => 1]), 'id', 'port_name'), ['prompt' => '-Choose a Port-', 'class' => 'form-control ports']) ?>

    <?php //$form->field($model, 'terminal')->dropDownList(ArrayHelper::map(Terminal::findAll(['status' => 1]), 'id', 'terminal'), ['prompt' => '-Choose a Terminal-']) ?>

    <?= $form->field($model, 'terminal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'appointment_no')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?php // $form->field($model, 'no_of_principal')->textInput(['maxlength' => true]) ?>
    <?php $arr = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'); ?>
    <?= $form->field($model, 'no_of_principal')->dropDownList($arr, ['prompt' => '-choose no of principal-']) ?>

    <?= $form->field($model, 'principal')->dropDownList(ArrayHelper::map(Debtor::findAll(['status' => 1]), 'id', 'principal_name'), ['options' => Yii::$app->SetValues->Selected($model->principal), 'prompt' => '-Choose a Principal-', 'multiple' => true]) ?>

    <?= $form->field($model, 'nominator')->dropDownList(ArrayHelper::map(Contacts::find()->where(new Expression('FIND_IN_SET(:contact_type, contact_type)'))->addParams([':contact_type' => 1])->all(), 'id', 'name'), ['prompt' => '-Choose a Nominator-']) ?>

    <?= $form->field($model, 'charterer')->dropDownList(ArrayHelper::map(Contacts::find()->where(new Expression('FIND_IN_SET(:contact_type, contact_type)'))->addParams([':contact_type' => 2])->all(), 'id', 'name'), ['prompt' => '-Choose a Charterer-']) ?>

    <?= $form->field($model, 'shipper')->dropDownList(ArrayHelper::map(Contacts::find()->where(new Expression('FIND_IN_SET(:contact_type, contact_type)'))->addParams([':contact_type' => 3])->all(), 'id', 'name'), ['prompt' => '-Choose a Shipper-']) ?>

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
<link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2.css">
<link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2-bootstrap.css">
<script src="<?= Yii::$app->homeUrl; ?>/js/select2/select2.min.js"></script>
<script>
        $("document").ready(function () {
            $('.ports').change(function () {
                var port_id = $(this).val();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {port_id: port_id},
                    url: '<?= Yii::$app->homeUrl; ?>/appointment/appointment/appointment-no',
                    success: function (data) {
                        $('#appointment-appointment_no').val(data);
                    }
                });
            });

        });
</script>
<script>
        $("document").ready(function () {
            $('#appointment-vessel_type').change(function () {
                var vessel_type = $(this).val();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    data: {vessel_type: vessel_type},
                    url: '<?= Yii::$app->homeUrl; ?>/appointment/appointment/vessel-type',
                    success: function (data) {
                        $('#appointment-vessel').html(data);
                    }
                });
            });

        });
</script>
<script>
        $("document").ready(function () {
            /* $('#appointment-no_of_principal').change(function () {
             var no_of_principal = $(this).val();
             $.ajax({
             type: 'POST',
             cache: false,
             data: {no_of_principal: no_of_principal},
             url: '<?= Yii::$app->homeUrl; ?>/appointment/appointment/principal',
             success: function (data) {
             $('#appointment-principal').html(data);
             }
             });
             });*/

            $('#appointment-principal').change(function (e) {
                    
                    
                   
                var principal = $(this).val();
                var No_principal = $('#appointment-no_of_principal').val();
                if(principal.length <= No_principal){
                        return true;
                }else{
                        var last = principal[principal.length-1];
                        $("#appointment-principal option[value='"+last+"']").prop("selected", false);
                        alert("Choose Principal same as Number of principal");
                        return false;
                }
              
            });

        });
</script>
<script type="text/javascript">
        jQuery(document).ready(function ($)
        {
            $("#appointment-nominator").select2({
                //placeholder: 'Select your country...',
                allowClear: true
            }).on('select2-open', function ()
            {
                // Adding Custom Scrollbar
                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
            });



            $("#appointment-charterer").select2({
                //placeholder: 'Select your country...',
                allowClear: true
            }).on('select2-open', function ()
            {
                // Adding Custom Scrollbar
                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
            });

            $("#appointment-shipper").select2({
                //placeholder: 'Select your country...',
                allowClear: true
            }).on('select2-open', function ()
            {
                // Adding Custom Scrollbar
                $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
            });


        });
</script>


<link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2.css">
<link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2-bootstrap.css">
<script src="<?= Yii::$app->homeUrl; ?>/js/select2/select2.min.js"></script>

