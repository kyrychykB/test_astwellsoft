<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Shop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'options' => ['style' => 'width: 170px; max-width: 170px;'],
                'contentOptions' => ['style' => 'width: 170px; max-width: 170px;'],
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'view' => function ($url, $data) {
                        return Html::a('<button type="button" class="btn btn-info" style="margin: 5px"><span class="glyphicon glyphicon-eye-open"></span></button>', $url, [
                            'title' => Yii::t('app', 'view'),
                        ]);
                    },
                    'update' => function ($url, $data) {
                        return Html::a('<button type="button" class="btn btn-primary" style="margin: 5px"><span class="glyphicon  glyphicon-pencil"></span></button>', $url, [
                            'title' => Yii::t('app', 'update'),
                        ]);
                    },
                    'delete' => function ($url, $data) {
                        return Html::a('<button type="button" class="btn btn-danger" style="margin: 5px"><span class=" glyphicon glyphicon-trash"></span></button>', $url, [
                            'title' => Yii::t('app', 'delete'),
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
