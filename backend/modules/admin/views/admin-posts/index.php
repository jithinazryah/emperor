<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="page-title">

    <div class="title-env">
        <h1 class="title"><?= Html::encode($this->title) ?></h1>
        <p class="description">Dynamic table variants with pagination and other controls</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="dashboard-1.html"><i class="fa-home"></i>Home</a>
            </li>
            <li>

                <a href="tables-basic.html">Tables</a>
            </li>
            <li class="active">

                <strong>Data Tables</strong>
            </li>
        </ol>

    </div>

</div>-->


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


            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                    'status',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>

    </div>
</div>
