<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Work;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 170px; max-width: 170px;'],
                'contentOptions' => ['style' => 'width: 170px; max-width: 170px;'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('<button type="button" class="btn btn-info" style="margin: 5px"><span class="glyphicon glyphicon-eye-open"></span></button>', $url, [
                            'title' => Yii::t('app', 'view'),
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('<button type="button" class="btn btn-primary" style="margin: 5px"><span class="glyphicon  glyphicon-pencil"></span></button>', $url, [
                            'title' => Yii::t('app', 'update'),
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<button type="button" class="btn btn-danger" style="margin: 5px"><span class=" glyphicon glyphicon-trash"></span></button>', $url, [
                            'title' => Yii::t('app', 'delete'),
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
