<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?php //echo  $form->field($model,'created_at')->widget(DatePicker::className(),['options' => ['class' => 'form-control','value' => date('Y-m-d H:i:s') ]]) ?>
    <?php //echo $form->field($model,'updated_at')->widget(DatePicker::className(),['options' => ['class' => 'form-control','value' => date('Y-m-d H:i:s') ]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
