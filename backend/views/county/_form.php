<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\County */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="county-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'country_id')->dropDownList(ArrayHelper::map($countries, 'id', 'name'),['prompt'=>'Select...']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
