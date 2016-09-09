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

$this->title = $model->appointment_no;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default" style="background : #e6e6e6">
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
                        <a href="#profile-4" data-toggle="tab">
                            <span class="visible-xs"><i class="fa-user"></i></span>
                            <span class="hidden-xs">Port call Data</span>
                        </a>
                    </li>
                    <li>
                        <a href="#profile-5" data-toggle="tab">
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
                                        //'id',
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
                                            'value' => call_user_func(function ($data) {
                                                            $principle = explode(',', $data->principal);
                                                            $result = '';
                                                            foreach ($principle as $prncple) {
                                                                    $result .= $data->getDebtorName($prncple) . ', ';
                                                            }
                                                            return rtrim($result, ",");
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
                            <?php
                             if (empty($estimates)) {
                                    echo Html::a('<i class="fa fa-plus"></i><span> Add EstimatedProforma</span>', ['estimated-proforma/add', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            } else {
                                    echo Html::a('<i class="fa fa-pencil"></i><span> Update EstimatedProforma</span>', ['estimated-proforma/add', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            }
                            ?>

                            <!--                            <hr class="appoint_history" />-->

                            <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                                <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">SERVICES</th>
                                            <th data-priority="3">SUPPLIER</th>
<!--                                            <th data-priority="3">CURRENCY</th>-->
                                            <th data-priority="1">RATE /QTY</th>
                                            <th data-priority="3">QTY</th>
                                            <th data-priority="6">ROE</th>
                                            <th data-priority="6">EPDA VALUE</th>
                                            <th data-priority="6">PRINCIPAL</th>
                                            <th data-priority="6">COMMENTS</th>
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
        <!--                                                <td><?php // $estimate->currency0->currency_symbol            ?></td>-->
                                                    <td><?= $estimate->unit_rate; ?></td>
                                                    <td><?= $estimate->unit; ?></td>
                                                    <td><?= $estimate->roe; ?></td>
                                                    <td><?= $estimate->epda; ?></td>
                                                    <td><?= $estimate->principal0->principal_name; ?></td>
                                                    <td><?= $estimate->comments; ?></td>
                                                </tr>	

                                                <?php
                                        endforeach;
                                        ?>
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

                    <div class="tab-pane" id="profile-4">

                        <div class="panel-body">
                            <?php
                             if (empty($ports)) {
                                    echo Html::a('<i class="fa fa-plus"></i><span> Add PortCallData</span>', ['port-call-data/update', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            } else {
                                    echo Html::a('<i class="fa fa-pencil"></i><span> Update PortCallData</span>', ['port-call-data/update', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            }
                            ?>
                            <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                                <div class="port-call-data-form form-inline">
                                    <div class="form-group field-portcalldata-eta">
                                        <label class="control-label" for="portcalldata-eta">ETA  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->eta) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-ets">
                                        <label class="control-label" for="portcalldata-ets">ETS  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->ets) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">EOSP  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->eosp) ?>
                                        <?= $$newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">ARRIVED ANCHORAGE  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->arrived_anchorage) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">NOR TENDERED  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->nor_tendered) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">DROPPED ANCHOR  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->dropped_anchor) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">ANCHOR AWEIGH  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->anchor_aweigh) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">ARRIVED PILOT STATION  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->arrived_pilot_station) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">POB INBOUND  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->pob_inbound) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">FIRST LINE ASHORE  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->first_line_ashore) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">ALL FAST  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->all_fast) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">GANGWAY DOWN  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->gangway_down) ?>
                                        <?= $newDate; ?>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">AGENT ON BOARD  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->agent_on_board) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">IMMIGRATION COMMENCED  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->immigration_commenced) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">IMMIGRATION COMPLETED  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->immigartion_completed) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">CARGO COMMENCED  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->cargo_commenced) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">CARGO COMPLETED  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->cargo_completed) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">POB OUTBOUND  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->pob_outbound) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">LAST LINE AWAY  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->lastline_away) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">CLEARED CHANNEL  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->cleared_channel) ?>
                                        <?= $$newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">COSP  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->cosp) ?>
                                        <?= $$newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">FASOP  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->fasop) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">ETA NEXT PORT  :</label>
                                        <?= Yii::$app->SetValues->ChangeFormate($ports->eta_next_port) ?>
                                        <?= $newDate; ?>

                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group field-portcalldata-eosp">
                                        <label class="control-label" for="portcalldata-eosp">COMMENTS  :</label>
                                        <?= $ports->comments; ?>

                                        <div class="help-block"></div>
                                    </div>



                                </div>

                                <link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2.css">
                                <link rel="stylesheet" href="<?= Yii::$app->homeUrl; ?>/js/select2/select2-bootstrap.css">
                                <script src="<?= Yii::$app->homeUrl; ?>/js/select2/select2.min.js"></script>


                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="profile-5">

                        <div class="panel-body">

                            <?php
                            if (empty($closeestimates)) {
                                    echo Html::a('<i class="fa fa-plus"></i><span> Add CloseEstimate</span>', ['close-estimate/add', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            } else {
                                    echo Html::a('<i class="fa fa-pencil"></i><span> Update CloseEstimate</span>', ['close-estimate/add', 'id' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
                            }
                            ?>


                            <div class="table-responsive" data-pattern="priority-columns" data-focus-btn-icon="fa-asterisk" data-sticky-table-header="true" data-add-display-all-btn="true" data-add-focus-btn="true">

                                <table cellspacing="0" class="table table-small-font table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="1">SERVICES</th>
                                            <th data-priority="3">SUPPLIER</th>
                                            <th data-priority="1">RATE /QTY</th>
                                            <th data-priority="3">QTY</th>
                                            <th data-priority="6">ROE</th>
                                            <th data-priority="6">EPDA VALUE</th>
                                            <th data-priority="6">FDA VALUE</th>
                                            <th data-priority="6">PAYMENT TYPE</th>
                                            <th data-priority="6">TOTAL</th>
                                            <th data-priority="6">PRINCIPAL</th>
                                            <th data-priority="6">COMMENTS</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($closeestimates as $closeestimate):
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <th><span class="co-name"><?= $closeestimate->service->service ?></span></th>
                                                    <td><?= $closeestimate->supplier0->name ?></td>
                                                    <td><?= $closeestimate->unit_rate; ?></td>
                                                    <td><?= $closeestimate->unit; ?></td>
                                                    <td><?= $closeestimate->roe; ?></td>
                                                    <td><?= $closeestimate->epda; ?></td>
                                                    <td><?= $closeestimate->fda; ?></td>
                                                    <td><?= $closeestimate->payment_type; ?></td>
                                                    <td><?= $closeestimate->total; ?></td>
                                                    <td><?= $closeestimate->principal0->principal_name; ?></td>
                                                    <td><?= $closeestimate->comments; ?></td>
                                                </tr>	

                                                <?php
                                        endforeach;
                                        ?>
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

                </div>
            </div>
        </div>
    </div>


