<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $status_list app\models\Work */
/* @var $shop_list app\models\Shop */

$this->title = 'Create Work';
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'status_list' => $status_list,
        'shop_list' => $shop_list
    ]) ?>

</div>
