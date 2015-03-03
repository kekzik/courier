<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h1>Создание заказа</h1>

<? $form = ActiveForm::begin(
        ['id' => 'order-form'])?>
          <?= $form->field($model, 'time_create') ?>
          <?= $form->field($model, 'name_order') ?>
          <?= $form->field($model, 'client') ?>
          <?= $form->field($model, 'user_courier') ?>
          <?= $form->field($model, 'metod_payment') ?> 
          <?= $form->field($model, 'item_id') ?> 
          <?= $form->field($model, 'description')->textArea(['rows' => 6]) ?>
          <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
<? ActiveForm::end();?>
