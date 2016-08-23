<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PortCallData */
$stat = $_GET['stat'];
$this->title = 'Update Port Call Data: ';
$this->params['breadcrumbs'][] = ['label' => 'Port Call Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= Html::encode($this->title).' # <b style="color: #008cbd;">'.$model->appointment->appointment_no.'</b>' ?></h3>

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
                <?php //Html::a('<i class="fa-th-list"></i><span> Manage Port Call Data</span>', ['index'], ['class' => 'btn btn-warning  btn-icon btn-icon-standalone']) ?>
                <ul class="nav nav-tabs nav-tabs-justified">
                    <li class="<?= $stat == 1 || $stat == NULL ? 'active': ''?>">
                        <a href="#port-data" data-toggle="tab">
                            <span class="visible-xs"><i class="fa-home"></i></span>
                            <span class="hidden-xs">Port Call Data</span>
                        </a>
                    </li>
                    <li class="<?= $stat == 2 ? 'active': ''?>">
                        <a href="#port-draft" data-toggle="tab">
                            <span class="visible-xs"><i class="fa-user"></i></span>
                            <span class="hidden-xs">Port Call Data Draft</span>
                        </a>
                    </li>
                    <li class="<?= $stat == 3 ? 'active': ''?>">
                        <a href="#port-rob" data-toggle="tab">
                            <span class="visible-xs"><i class="fa-user"></i></span>
                            <span class="hidden-xs">Port Call Data ROB</span>
                        </a>
                    </li>
                </ul>    
                <div class="tab-content">
                    <div class="tab-pane <?= $stat == 1 || $stat == NULL ? 'active': ''?>" id="port-data">
                        <div class="panel-body">
                            <div class="port-call-data-create">
                                <?=
                                $this->render('_form', [
                                    'model' => $model,
                                    'model_add' => $model_add,
                                ])
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane <?= $stat == 2 ? 'active': ''?>" id="port-draft">
                        <div class="panel-body">
                            <div class="port-call-data-draft-create">
                                <?=
                                $this->render('_form_draft', [
                                    'model' => $model_draft,
                                ])
                                ?>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane <?= $stat == 3 ? 'active': ''?>" id="port-rob">
                        <div class="panel-body">
                            <div class="port-call-data-draft-create">
                                <?=
                                $this->render('_form_rob', [
                                    'model' => $model_rob,
                                ])
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
