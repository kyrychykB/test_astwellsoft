<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $status_list app\models\Work */
/* @var $shop_list app\models\Shop */

$this->title = 'Test Application';

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use app\models\Work;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="work-index">
        <div class="row">
            <div class="col-md-3">

                <div class="panel panel-info">
                    <div class="panel-body"><b>Filter</b></div>
                    <div class="panel-footer">
                        <?php  echo $this->render('_search', [
                            'model' => $searchModel,
                            'status_list' => $status_list,
                            'shop_list' => $shop_list,
                        ]); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <h3>Serch results</h3>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
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
                        'time_close'
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
