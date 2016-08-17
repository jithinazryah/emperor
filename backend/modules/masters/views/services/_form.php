<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\ServiceCategorys;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form form-inline">

    <?php $form = ActiveForm::begin(); ?>
<?php
    $dataList=ArrayHelper::map(ServiceCategorys::find()->asArray()->all(), 'id', 'category_name');
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($dataList, 
         ['prompt'=>'-Choose a Category-']) ?>
    
    <?= $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invocie_type')->textInput() ?>

    <?= $form->field($model, 'supplier')->textInput() ?>

    <?= $form->field($model, 'unit_rate')->textInput() ?>

    <?= $form->field($model, 'unit')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput() ?>

    <?= $form->field($model, 'roe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'epda_value')->textInput() ?>

    <?= $form->field($model, 'cost_allocation')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
    <div class="form-group" style="float: right;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'margin-top: 18px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
