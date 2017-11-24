<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Work;

/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'shop_id',
                'format' => 'html',
                'value' => function($data){
                    return $data->shop->name;
                },
            ],
            [
                'attribute' => 'status',
                'filter' => Work::getStatusList(),
                'format' => 'html',
                'value' => function($data){
                    $result = '';
                    $name = $data->getStatusName();
                    if($data->status == Work::STATUS_CLOSE) {
                        $result = "<span class=\"label label-danger\">{$name}</span>";
                    } elseif ($data->status == Work::STATUS_OPEN) {
                        $result = "<span class=\"label label-success\">{$name}</span>";
                    }
                    return $result;
                },
            ],
            'date',
            'time_open',
            'time_close',
        ],
    ]) ?>

</div>
