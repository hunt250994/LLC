<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LlCompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ll-company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    

    <?= $form->field($model, 'Comapny_name') ?>

    <?= $form->field($model, 'company_email') ?>

    <?= $form->field($model, 'company_mobile') ?>

    <?= $form->field($model, 'flat_no') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'landmark') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'pincode') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php  echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
