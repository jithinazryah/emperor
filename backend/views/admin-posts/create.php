<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminPosts */

$this->title = 'Create Admin Posts';
$this->params['breadcrumbs'][] = ['label' => 'Admin Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="page-title">

        <div class="title-env">
                <h1 class="title">Responsive Table</h1>
                <p class="description">An example of responsive table with fixed header</p>
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

                                <strong>Responsive Table</strong>
                        </li>
                </ol>

        </div>

</div>-->

<div class="row">
        <div class="col-md-12">

                <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

                                <div class="panel-options">
                                        <a href="#">
                                                <i class="linecons-cog"></i>
                                        </a>

                                        <a href="#" data-toggle="panel">
                                                <span class="collapse-icon">&ndash;</span>
                                                <span class="expand-icon">+</span>
                                        </a>

                                        <a href="#" data-toggle="reload">
                                                <i class="fa-rotate-right"></i>
                                        </a>

                                        <a href="#" data-toggle="remove">
                                                &times;
                                        </a>
                                </div>
                        </div>
                        <button class="btn btn-warning  btn-icon btn-icon-standalone" style="    margin-top: 20px;margin-bottom: 0px;margin-left: 32px;">
                                <i class="fa-th-list"></i>
                                <span>Manage Admin Posts</span>
                        </button>
                        <div class="panel-body">

                                <div class="panel-body"><div class="admin-posts-create">


                                                <?=
                                                $this->render('_form', [
                                                    'model' => $model,
                                                ])
                                                ?>

                                        </div>

                                </div>

                                <script type="text/javascript">
                                        // This JavaScript Will Replace Checkboxes in dropdown toggles
                                        jQuery(document).ready(function ($)
                                        {
                                                setTimeout(function ()
                                                {

                                                        $(".checkbox-row input").addClass('cbr');
                                                        cbr_replace();
                                                }, 0);
                                        });
                                </script>


                        </div>

                </div>
        </div>
</div>

