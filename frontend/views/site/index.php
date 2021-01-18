<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\Test */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('@web/css/slider.css');
$this->registerJsFile('@web/js/slider.js');

if ($model->hasErrors()) {
  var_dump($model->getErrors());
}

?>

<h1>Отправить данные</h1>
<div class="row">
    <div class="col-lg-4">

        <?php
        $form = ActiveForm::begin();
        $options = [
            'min' => 1,
            'max' => 10,
            'class' => 'slider',
        ];

        echo $form->field($model, 'quantity')->input('range', $options)->label('Количество - 5');
        echo $form->field($model, 'email')->label('Email');
        echo $form->field($model, 'fio')->label('ФИО');

        echo Html::submitButton('Отправить', [
          'class' => 'btn btn-primary',
        ]);

        ActiveForm::end();
        ?>

    </div>
</div>
