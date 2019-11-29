<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CreditSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'c_type') ?>

    <?= $form->field($model, 'viloyat') ?>

    <?php // echo $form->field($model, 'fillial') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'summa') ?>

    <?php // echo $form->field($model, 'expire_date') ?>

    <?php // echo $form->field($model, 'supply') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
