<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\WorkSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $status_list array */
/* @var $shop_list array */
?>

<div class="work-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

        <?=$form->field($model, 'shop_id')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map($shop_list, 'id', 'name'),
            'language' => 'en',
            'hideSearch' => true,
            'options' => ['placeholder' => 'select shop'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);?>

        <?=$form->field($model, 'status')->widget(Select2::classname(), [
            'data' => $status_list,
            'language' => 'en',
            'hideSearch' => true,
            'options' => ['placeholder' => 'select status'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);?>


        <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
            'language' => 'en',
            'options' => ['placeholder' => 'select date'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose'=>true
            ]
        ]);?>

        <?=$form->field($model, 'time_open')->widget(TimePicker::classname(), [
            'value'=> '00:00',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => date('H:i', strtotime('-2 hour')),
            ]
        ]) ?>

        <?=$form->field($model, 'time_close')->widget(TimePicker::classname(), [
            'value'=> '23:00',
            'pluginOptions' => [
                'showSeconds' => false,
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => '23:00',
            ]
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default ']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
