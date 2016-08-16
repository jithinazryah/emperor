<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

Pjax::begin();
/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Posts';
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



                                <div class="admin-posts-index">


                                        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

                                        <p>
                                                <?= Html::a('<i class="fa-pencil-square-o"></i><span>Create Admin Posts</span>', ['create'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                                        </p>

                                        <?=
                                        GridView::widget([
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'tableOptions' => [
                                                'class' => 'table table-striped table-bordered dataTable',
                                                'role' => 'grid',
                                                'aria-describedby' => 'example-3_info',
                                            ],
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],
                                                'post_name',
                                                [
                                                    'attribute' => 'admin',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'masters',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'appointments',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'estimated_proforma',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'port_call_data',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'close_estimate',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Yes' : 'No';
                                                    },
                                                ],
                                                [
                                                    'attribute' => 'status',
                                                    'format' => 'raw',
                                                    'value' => function ($model) {
                                                            return $model->admin == 1 ? 'Enabled' : 'disabled';
                                                    },
                                                ],
                                                ['class' => 'yii\grid\ActionColumn'],
                                            ],
                                        ]);
                                        ?>

                                </div>

                        </div>
                </div>
        </div>
</div>
<?php Pjax::end(); ?>