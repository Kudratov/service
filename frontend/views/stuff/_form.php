<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Viloyatlar;
use frontend\models\Filiallar;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stuff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stuff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($model, 'password')->passwordInput(['value'=>''],['maxlength' => true])?>
    <?= $form->field($model, 'password_repeat')->passwordInput(['value'=>''])?>

    <?= $form->field($model, 'viloyat')->dropDownList(
                                           
                                           ArrayHelper::map(Viloyatlar::find()->asArray()->all(),'vil_id','viloyat'),
                                           [
                                            'prompt'=>'Select type ',
                                            
                                            'onchange'=>'
                                            $.post("index.php?r=company/lists&id='.'"+$(this).val(),function(data){
                                                $("select#fil_id2").html(data);
                                            });'
                                           ]); ?>


        
                                            <!--
                                           ->select(['viloyat','vil_id'])
                                           ->indexBy('vil_id')
                                           ->column(), ['prompt'=>'Select type ']
                                            -->

        <?= $form->field($model, 'tuman')->dropDownList(
        
        ArrayHelper::map(Filiallar::find()->asArray()->all(),'fil_id','filial'),
        [
        'prompt'=>'Select type ',
        'id' => 'fil_id2',
        
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
