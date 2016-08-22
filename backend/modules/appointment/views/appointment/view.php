<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use common\models\VesselType;
use common\models\Vessel;
use common\models\Ports;
use common\models\Services;
use common\models\Currency;
use common\models\Terminal;
use common\models\Debtor;
use common\models\Contacts;
use common\models\Purpose;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Appointment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

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
                <?= Html::a('<i class="fa-th-list"></i><span> Manage Appointment</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                <ul class="nav nav-tabs nav-tabs-justified">
						<li class="active">
							<a href="#home-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-home"></i></span>
								<span class="hidden-xs">Appointment</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Estimated Proforma</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Port call Data</span>
							</a>
						</li>
						<li>
							<a href="#profile-3" data-toggle="tab">
								<span class="visible-xs"><i class="fa-user"></i></span>
								<span class="hidden-xs">Close Estimate</span>
							</a>
						</li>
										</ul>
					
					<div class="tab-content">
						<div class="tab-pane active" id="home-3">
							
							<div class="panel-body"><div class="appointment-view">
                        
                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <?=
                            Html::a('Delete', ['delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ])
        ?>
        
                        </p>

                        <?=
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                [
                                    'attribute' => 'vessel_type',
                                    'value' => call_user_func(function($model) {

                                                return VesselType::findOne($model->vessel_type)->vessel_type;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'vessel',
                                    'value' => call_user_func(function($model) {

                                                return Vessel::findOne($model->vessel)->vessel_name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'port_of_call',
                                    'value' => call_user_func(function($model) {

                                                return Ports::findOne($model->port_of_call)->port_name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'terminal',
                                    'value' => call_user_func(function($model) {

                                                return Terminal::findOne($model->terminal)->terminal;
                                            }, $model),
                                ],
                                'birth_no',
                                'appointment_no',
                                'no_of_principal',
                                [
                                    'attribute' => 'principal',
                                    'value' => call_user_func(function($model) {

                                                return Debtor::findOne($model->principal)->principal_name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'nominator',
                                    'value' => call_user_func(function($model) {

                                                return Contacts::findOne($model->nominator)->name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'charterer',
                                    'value' => call_user_func(function($model) {

                                                return Contacts::findOne($model->charterer)->name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'shipper',
                                    'value' => call_user_func(function($model) {

                                                return Contacts::findOne($model->shipper)->name;
                                            }, $model),
                                ],
                                [
                                    'attribute' => 'purpose',
                                    'value' => call_user_func(function($model) {

                                                return Purpose::findOne($model->purpose)->purpose;
                                            }, $model),
                                ],
                                'cargo',
                                'quantity',
                                'last_port',
                                'next_port',
                                'eta',
                                'stage',
                                [
                                    'label' => 'Status',
                                    'format' => 'raw',
                                    'value' => $model->status == 1 ? 'Enabled' : 'disabled',
                                ],
                            ],
                        ])
                        ?>
                    </div>
                </div>
							
						</div>
						<div class="tab-pane" id="profile-3">
							
							<div class="panel-body">
                                
                               

                                <hr class="appoint_history" />

                                <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                                        <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                                <thead>
                                                        <tr>
                                                                <th data-priority="1">#</th>
                                                                <th data-priority="1">SERVICES</th>
                                                                <th data-priority="3">SUPPLIER</th>
                                                                <th data-priority="3">CURRENCY</th>
                                                                <th data-priority="1">RATE /QTY</th>
                                                                <th data-priority="3">QTY</th>
                                                                <th data-priority="6">ROE</th>
                                                                <th data-priority="6">EPDA VALUE</th>
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
                                                                <td><?= $estimate->currency0->currency_symbol ?></td>
                                                                <td><?= $estimate->unit_rate; ?></td>
                                                                <td><?= $estimate->unit; ?></td>
                                                                <td><?= $estimate->roe; ?></td>
                                                                <td><?= $estimate->epda; ?></td>
                                                                <td><?= $estimate->principal0->principal_name; ?></td>
                                                                <td><?= $estimate->comments; ?></td>
                                                                <td>
                                                                    <?= Html::a('Edit', ['/appointment/estimated-proforma/add','id'=>1,'prfrma_id'=>$estimate->id], ['class'=>'btn btn-primary']) ?>
                                                                    <?= Html::a('Delete', ['/appointment/estimated-proforma/delete-performa','id'=>$estimate->id], ['class'=>'btn btn-red']) ?>
                                                                </td>
                                                        </tr>	

                                                                <?php
                                                        endforeach;
                                                        ?>
                                                       		 
                                                        <tr>
                                                                <?php $form = ActiveForm::begin(); ?>
                                                                <td></td>
                                                                <td><?= $form->field($model_new, 'service_id')->dropDownList(ArrayHelper::map(Services::findAll(['status' => 1]), 'id', 'service'), ['prompt' => '-Service-'])->label(false); ?></td>
                                                                <td><?= $form->field($model_new, 'supplier')->dropDownList(ArrayHelper::map(Contacts::findAll(['status' => 1]), 'id', 'name'), ['prompt' => '-Supplier-'])->label(false); ?></td>
                                                                <td><?= $form->field($model_new, 'currency')->dropDownList(ArrayHelper::map(Currency::findAll(['status' => 1]), 'id', 'currency_name'), ['prompt' => '-Currency-'])->label(false); ?></td>
                                                                <td><?= $form->field($model_new, 'unit_rate')->textInput(['placeholder' => 'Unit Rate'])->label(false) ?></td>
                                                                <td><?= $form->field($model_new, 'unit')->textInput(['placeholder' => 'Quantity'])->label(false) ?></td>
                                                                <td><?= $form->field($model_new, 'roe')->textInput(['placeholder' => 'ROE'])->label(false) ?></td>
                                                                <td><?= $form->field($model_new, 'epda')->textInput(['placeholder' => 'EPDA'])->label(false) ?></td>
                                                                <td><?= $form->field($model_new, 'principal')->dropDownList(ArrayHelper::map(Debtor::findAll(['status' => 1]), 'id', 'principal_name'), ['prompt' => '-Principal-'])->label(false); ?></td>
                                                                <td><?= $form->field($model_new, 'comments')->textInput(['placeholder' => 'Comments'])->label(false) ?></td>
                                                                <td><?= Html::submitButton($model_new->isNewRecord ? 'Add' : 'Update', ['class' => 'btn btn-success']) ?>
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
						</div>
						<div class="tab-pane" id="messages-3">
							
							<p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p>
							
							<p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
					
						</div>
						
						<div class="tab-pane" id="settings-3">
								
							<p>Luckily friends do ashamed to do suppose. Tried meant mr smile so. Exquisite behaviour as to middleton perfectly. Chicken no wishing waiting am. Say concerns dwelling graceful six humoured. Whether mr up savings talking an. Active mutual nor father mother exeter change six did all. </p>
							
							<p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
				
						</div>
						
						<div class="tab-pane" id="inbox-3">
								
							<p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
							
							<p>Luckily friends do ashamed to do suppose. Tried meant mr smile so. Exquisite behaviour as to middleton perfectly. Chicken no wishing waiting am. Say concerns dwelling graceful six humoured. Whether mr up savings talking an. Active mutual nor father mother exeter change six did all. </p>
				
						</div>
					</div>
                
                
            </div>
        </div>
    </div>
</div>


