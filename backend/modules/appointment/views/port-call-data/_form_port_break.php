<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PortBreakTimings;

/* @var $this yii\web\View */
/* @var $model common\models\PortBreakTimings */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="port-call-data-form form-inline">
<?= Html::beginForm(['port-call-data/port-break'], 'post', ['target' => '_blank']) ?>
<div id = "port_break">
    <input type="hidden" id="app_id"  name="app_id" value="<?= $model_appointment->id; ?>">
    <input type="hidden" id="delete_port_break"  name="delete_port_break" value="">
    <?php
    if (!empty($model_port_break)) {

            foreach ($model_port_break as $data) {
                    ?>
                    <span>
                        <div class="form-group">
                            <input type="text" class="form-control" name="updatee[<?= $data->id; ?>][label][]" value="<?= $data->label; ?>" required>
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form-control" name="updatee[<?= $data->id; ?>][value][]" value="<?= $data->value; ?>" required>
                        </div>
                        <div class="form-group">
                            <a id="remScnt" val="<?= $data->id; ?>" class="btn btn-icon btn-red remScnt" ><i class="fa-remove"></i></a>
                        </div>
                    </span>
                    <br>
                    <?php
            }
    }
    ?>
    <br>
    <span>
        <div class="form-group">
            <label class="control-label">Label</label>
            <input type="text" class="form-control" name="create[label][]">
        </div>
        <div class="form-group ">
            <label class="control-label" for="">Value</label>
            <input type="text" class="form-control" name="create[valuee][]">
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
    <a id="addportbreak" class="btn btn-icon btn-blue addScnt" ><i class="fa-plus"></i></a>
<!--        <button id="addScnt" class="btn btn-icon btn-blue"  ><i class="fa-plus"></i></button>-->
</div><br/>
<div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
</div>
<div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
</div>
<div class="form-group field-portcalldatarob-fresh_water_arrival_quantity">
</div>

<?= Html::submitButton('<span>SAVE</span>', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>
</div>
<script>
        $(document).ready(function () {
            /*
             * Add more bnutton function
             */
            var scntDiv = $('#port_break');
            var i = $('#port_break span').size() + 1;

            $('#addportbreak').on('click', function () {
                var ver = '<span>\n\
                                <div class="form-group">\n\
                                <label class="control-label" for=""></label>\n\
                                <input type="text" id="" class="form-control" name="create[label][]" required>\n\
                                </div> \n\
                                <div class="form-group">\n\
                                <label class="control-label" for=""></label>\n\
                                <input type="text" class="form-control" name="create[valuee][]" required>\n\
                                </div> \n\
                                <div class="form-group">\n\
                                <a id="remScnt" class="btn btn-icon btn-red remScnt" ><i class="fa-remove"></i></a>\n\
                                 </div><br/>\n\
                                </span>';


                $(ver).appendTo(scntDiv);
                i++;
                return false;
            });
            $('#port_break').on('click', '.remScnt', function () {
                if (i > 2) {
                    $(this).parents('span').remove();
                    i--;
                }
                if (this.hasAttribute("val")) {
                    var valu = $(this).attr('val');
                    $('#delete_port_break').val($('#delete_port_break').val() + valu + ',')
                }
                return false;
            });

            $('.portcall').click(function () {
                $('.hidediv').slideToggle();
            });
        });
</script>

