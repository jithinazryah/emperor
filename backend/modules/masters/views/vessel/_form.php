<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\VesselType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Vessel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vessel-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
<?php
    $dataList=ArrayHelper::map(VesselType::find()->asArray()->all(), 'id', 'vessel_type');
    ?>
    <?= $form->field($model, 'vessel_type')->dropDownList($dataList, 
         ['prompt'=>'--Choose a Vessel type--']) ?>

    <?= $form->field($model, 'vessel_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imo_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'official')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mmsi_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owners_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'land_line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direct_line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dwt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nrt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beam')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>

    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
