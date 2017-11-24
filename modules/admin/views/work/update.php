<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $status_list array */
/* @var $shop_list array */

$this->title = 'Update Work: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="work-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status_list' => $status_list,
        'shop_list' => $shop_list,

    ]) ?>

</div>
