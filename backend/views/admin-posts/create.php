<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AdminPosts */

$this->title = 'Create Admin Posts';
$this->params['breadcrumbs'][] = ['label' => 'Admin Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-posts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
