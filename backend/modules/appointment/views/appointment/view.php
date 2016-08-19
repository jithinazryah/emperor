<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\VesselType;
use common\models\Vessel;
use common\models\Ports;
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
        </div>
    </div>
</div>


