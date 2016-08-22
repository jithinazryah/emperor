<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\EstimatedProforma */

$this->title = 'Create Estimated Proforma';
$this->params['breadcrumbs'][] = ['label' => 'Estimated Proformas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h2  class="appoint-title panel-title"><?= Html::encode($this->title) . ' # <b style="color: #008cbd;">' . $appointment->appointment_no.'</b>' ?></h2>

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
                                                                <th data-priority="1">RATE /QTY</th>
                                                                <th data-priority="3">QTY</th>
                                                                <th data-priority="3">CURRENCY</th>
                                                                <th data-priority="6">ROE</th>
                                                                <th data-priority="6">EPDA VALUE</th>
                                                                <th data-priority="6">PRINCIPAL</th>
                                                                <th data-priority="6">COMMENTS</th>
                                                                <th data-priority="1">ACTIONS</th>
                                                        </tr>
                                                </thead>
                                                 <?php Pjax::begin(); ?> 
                                                <tbody>
                                                        <tr>
                                                                <td>1</td>
                                                                <th>GOOG <span class="co-name">Google Inc.</span></th>
                                                                <td>597.74</td>
                                                                <td>12:12PM</td>
                                                                <td>14.81 (2.54%)</td>
                                                                <td>582.93</td>
                                                                <td>597.95</td>
                                                                <td>597.73 x 100</td>
                                                                <td>597.95</td>
                                                                <td>597.73 x 100</td>
                                                                <td>597.73 x 100</td>
                                                        </tr>		
                                                        <tr>
                                                                <td>2</td>
                                                                <th>AAPL <span class="co-name">Apple Inc.</span></th>
                                                                <td>378.94</td>
                                                                <td>12:22PM</td>
                                                                <td>5.74 (1.54%)</td>
                                                                <td>373.20</td>
                                                                <td>381.02</td>
                                                                <td>378.92 x 300</td>
                                                                <td>30.67</td>
                                                                <td>31.14 x 6500</td>
                                                                <td>31.14 x 6500</td>
                                                        </tr>		
                                                        <tr>
                                                                <td>3</td>
                                                                <th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
                                                                <td>191.55</td>
                                                                <td>12:23PM</td>
                                                                <td>3.16 (1.68%)</td>
                                                                <td>188.39</td>
                                                                <td>194.99</td>
                                                                <td>191.52 x 300</td>
                                                                <td>30.67</td>
                                                                <td>31.14 x 6500</td>
                                                                <td>31.14 x 6500</td>
                                                        </tr>		 
                                                        <tr>
                                                                <?php $form = ActiveForm::begin(); ?>
                                                                <td><?= $form->errorSummary($model); ?></td>
                                                                <td><?= $form->field($model, 'service_id')->textInput(['placeholder' => 'Service'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'supplier')->textInput(['placeholder' => 'Supplier'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'currency')->textInput(['placeholder' => 'Currency'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'unit_rate')->textInput(['placeholder' => 'Unit Rate'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'unit')->textInput(['placeholder' => 'Unit'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'roe')->textInput(['placeholder' => 'ROE'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'epda')->textInput(['placeholder' => 'EPDA'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'principal')->textInput(['placeholder' => 'Principal'])->label(false) ?></td>
                                                                <td><?= $form->field($model, 'comments')->textInput(['placeholder' => 'Comments'])->label(false) ?></td>
                                                                <td><?= Html::submitButton('Add', ['class' => 'btn btn-success']) ?></td>
                                                                <?php ActiveForm::end(); ?>
                                                        </tr>		

                                                        <!-- Repeat -->

                                                </tbody>
                                                 <?php Pjax::end(); ?> 
                                        </table>

                                </div>

                                <script type="text/javascript">
                                        // This JavaScript Will Replace Checkboxes in dropdown toggles
                                        /*jQuery(document).ready(function($)
                                         {
                                         setTimeout(function()
                                         {
                                         $(".checkbox-row input").addClass('cbr');
                                         cbr_replace();
                                         }, 0);
                                         });*/
                                </script>


                        </div>
                        <!--                        <div class="panel-body">
                        <?= Html::a('<i class="fa-th-list"></i><span> Manage Estimated Proforma</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                                        <div class="panel-body"><div class="estimated-proforma-create">
                        <?=
                        $this->render('_form', [
                            'model' => $model,
                        ])
                        ?>
                                                                </div>
                                                        </div>
                                                </div>-->
                </div>
        </div>
</div>

