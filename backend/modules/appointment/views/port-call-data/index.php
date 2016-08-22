<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PortCallDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Port Call Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="port-call-data-index">

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
                                                                                            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                                        
                                        <?=  Html::a('<i class="fa-th-list"></i><span> Create Port Call Data</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                                <?php Pjax::begin(); ?>                                                                                                        <?= GridView::widget([
                                                'dataProvider' => $dataProvider,
                                                'filterModel' => $searchModel,
        'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],

                                                            'id',
            'appointment_id',
            'eta',
            'ets',
            'eosp',
            // 'arrived_anchorage',
            // 'nor_tendered',
            // 'dropped_anchor',
            // 'anchor_aweigh',
            // 'arrived_pilot_station',
            // 'pob_inbound',
            // 'first_line_ashore',
            // 'all_fast',
            // 'gangway_down',
            // 'agent_on_board',
            // 'immigration_commenced',
            // 'immigartion_completed',
            // 'cargo_commenced',
            // 'cargo_completed',
            // 'pob_outbound',
            // 'lastline_away',
            // 'cleared_channel',
            // 'cosp',
            // 'fasop',
            // 'eta_next_port',
            // 'additional_info',
            // 'comments:ntext',
            // 'status',
            // 'CB',
            // 'UB',
            // 'DOC',
            // 'DOU',

                                                ['class' => 'yii\grid\ActionColumn'],
                                                ],
                                                ]); ?>
                                                                                <?php Pjax::end(); ?>                                </div>
                        </div>
                </div>
        </div>
</div>


