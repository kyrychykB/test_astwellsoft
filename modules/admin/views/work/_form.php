<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $status_list array */
/* @var $shop_list array */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(); ?>

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
        'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 1,

        ]
    ]) ?>

    <?=$form->field($model, 'time_close')->widget(TimePicker::classname(), [
        'pluginOptions' => [
            'showSeconds' => false,
            'showMeridian' => false,
            'minuteStep' => 1,
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
