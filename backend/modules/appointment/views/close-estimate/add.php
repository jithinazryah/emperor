<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use common\models\Services;
use common\models\Currency;
use common\models\Contacts;
use common\models\Debtor;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\EstimatedProforma */

$this->title = 'Create Close Estimte';
$this->params['breadcrumbs'][] = ['label' => 'Close Estimte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h2  class="appoint-title panel-title"><?= Html::encode($this->title) . ' # <b style="color: #008cbd;">' . $appointment->appointment_no . '</b>' ?></h2>

                                <div class="panel-options">
                                        <a href="#" data-toggle="panel">
                                                <span class="collapse-icon">&ndash;</span>
                                                <span class="expand-icon">+</span>
                                        </a>
                                        <a href="#" data-toggle="remove">
                                                &times;
                                        </a>
                                </div>
                        </div>
                        <?php //Pjax::begin(); ?> 
                        <div class="panel-body">
                                <div class="row appoint">
                                        <div class="col-sm-3" style="text-align: right">
                                                <label>VESSEL-TYPE</label>      
                                                <b>: <?= $appointment->vesselType->vessel_type; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>VESSEL-NAME</label>      
                                                <b>: <?= $appointment->vessel0->vessel_name; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>LAST-PORT</label>      
                                                <b>: <?= $appointment->last_port; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>NEXT-PORT</label>      
                                                <b>: <?= $appointment->next_port; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>PORT OF CALL</label>      
                                                <b>: <?= $appointment->portOfCall->port_name; ?></b>
                                        </div>
                                </div>
                                <div class="row appoint">
                                        <div class="col-sm-3" style="text-align: right">
                                                <label>PURPOSE</label>      
                                                <b>: <?= $appointment->purpose0->purpose; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>CARGO</label>      
                                                <b>: <?= $appointment->cargo; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>QUANTITY</label>      
                                                <b>: <?= $appointment->quantity; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>TERMINAL</label>      
                                                <b>: <?= $appointment->terminal0->terminal; ?></b>
                                        </div>
                                        <div class="col-sm-2" style="text-align: right">
                                                <label>BERTH NO:</label>      
                                                <b>: <?= $appointment->birth_no; ?></b>
                                        </div>
                                </div>

                                <hr class="appoint_history" />

                                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                                        <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                                <thead>
                                                        <tr>
                                                                <th data-priority="1">#</th>
                                                                <th data-priority="1">SERVICES</th>
                                                                <th data-priority="3">SUPPLIER</th>
<!--                                                                <th data-priority="3">CURRENCY</th>-->
                                                                <th data-priority="1">RATE /QTY</th>
                                                                <th data-priority="3">QTY</th>
<!--                                                                <th data-priority="6">ROE</th>-->
                                                                <th data-priority="6">EPDA VALUE</th>
                                                                <th data-priority="6">FDA VALUE</th>
                                                                <th data-priority="6">PAYMENT TYPE</th>
                                                                <th data-priority="6">TOTAL</th>
                                                                <th data-priority="6">PRINCIPAL</th>
                                                                <th data-priority="6">COMMENTS</th>
                                                                <th data-priority="1">ACTIONS</th>
                                                        </tr>
                                                </thead>
                                                
                                                <tbody>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($estimates as $estimate):
                                                                $i++;
                                                                ?>
                                                        <tr>
                                                                <td><?= $i; ?></td>
                                                                <th><span class="co-name"><?= $estimate->service->service ?></span></th>
                                                                <td><?= $estimate->supplier0->name ?></td>
<!--                                                                <td><? $estimate->currency0->currency_symbol ?></td>-->
                                                                <td><?= $estimate->unit_rate; ?></td>
                                                                <td><?= $estimate->unit; ?></td>
<!--                                                                <td><? $estimate->roe; ?></td>-->
                                                                <td><?= $estimate->epda; ?></td>
                                                                <td><?= $estimate->fda; ?></td>
                                                                <td><?= $estimate->payment_type; ?></td>
                                                                <td><?= $estimate->total; ?></td>
                                                                <td><?= $estimate->principal0->principal_name; ?></td>
                                                                <td><?= $estimate->comments; ?></td>
                                                                <td>
                                                                    <?= Html::a('Edit', ['/appointment/close-estimate/add','id'=>$id,'prfrma_id'=>$estimate->id], ['class'=>'btn btn-primary']) ?>
                                                                    <?= Html::a('Delete', ['/appointment/close-estimate/delete-close-estimate','id'=>$estimate->id], ['class'=>'btn btn-red']) ?>
                                                                </td>
                                                        </tr>	

                                                                <?php
                                                        endforeach;
                                                        ?>
                                                       		 
                                                        <tr>
                                                                <?php $form = ActiveForm::begin(); ?>
                                                                <td></td>
                                                                <td><?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::findAll(['status' => 1]), 'id', 'service'), ['prompt' => '-Service-'])->label(false); ?></td>
                                                                <td><?= $form->field($model, 'supplier')->dropDownList(ArrayHelper::map(Contacts::findAll(['status' => 1]), 'id', 'name'), ['prompt' => '-Supplier-'])->label(false); ?></td>
<!--                                                                <td><?php // $form->field($model, 'currency')->dropDownList(ArrayHelper::map(Currency::findAll(['status' => 1]), 'id', 'currency_name'), ['prompt' => '-Currency-'])->label(false); ?></td>-->
                                                                <td><?= $form->field($model, 'unit_rate')->textInput(['placeholder' => 'Unit Rate'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'unit')->textInput(['placeholder' => 'Quantity'])->label(false) ?></td>
<!--                                                                <td><?php // $form->field($model, 'roe')->textInput(['placeholder' => 'ROE'])->label(false) ?></td>-->
                                                                <td><?= $form->field($model, 'epda')->textInput(['placeholder' => 'EPDA'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'fda')->textInput(['placeholder' => 'FDA'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'payment_type')->textInput(['placeholder' => 'Payment Type'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'total')->textInput(['placeholder' => 'TOTAL'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'principal')->dropDownList(ArrayHelper::map(Debtor::findAll(['status' => 1]), 'id', 'principal_name'), ['prompt' => '-Principal-'])->label(false); ?></td>
                                                                <td><?= $form->field($model, 'comments')->textInput(['placeholder' => 'Comments'])->label(false) ?></td>
                                                                <td><?= Html::submitButton($model->isNewRecord ? 'Add' : 'Update', ['class' => 'btn btn-success']) ?>
                                                                </td>
                                                                <?php ActiveForm::end(); ?>
                                                        </tr>		

                                                        <!-- Repeat -->

                                                </tbody>
                                              
                                        </table>

                                </div>
                                <script type="text/javascript">
                                        jQuery(document).ready(function ($)
                                        {
                                                $("#estimatedproforma-service_id").select2({
                                                        //placeholder: 'Select your country...',
                                                        allowClear: true
                                                }).on('select2-open', function ()
                                                {
                                                        // Adding Custom Scrollbar
                                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                                });
                                                
                                                

                                                $("#estimatedproforma-supplier").select2({
                                                        //placeholder: 'Select your country...',
                                                        allowClear: true
                                                }).on('select2-open', function ()
                                                {
                                                        // Adding Custom Scrollbar
                                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                                });
                                                
                                                $("#estimatedproforma-currency").select2({
                                                        //placeholder: 'Select your country...',
                                                        allowClear: true
                                                }).on('select2-open', function ()
                                                {
                                                        // Adding Custom Scrollbar
                                                        $(this).data('select2').results.addClass('overflow-hidden').perfectScrollbar();
                                                });
                                                
                                                
                                                 $("#estimatedproforma-principal").select2({
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


                        </div>
                          <?php //Pjax::end(); ?> 
                </div>
        </div>
</div>

