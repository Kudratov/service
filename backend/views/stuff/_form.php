<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Viloyatlar;
use backend\models\Filiallar;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stuff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-group">

    <?php $form = ActiveForm::begin(); ?>
                

    <?= $form->field($stuff, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($stuff, 'contact')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
                                  'name' => 'input-5',
                                  'mask' => ['+999-99-999-9999']
                              ]); ?>

    <?= $form->field($stuff, 'username')->textInput(['maxlength' => true]) ?>

    

    <?= $form->field($stuff, 'password')->passwordInput(['value'=>''],['maxlength' => true])?>
    <div class="form-group">
      <label > Паролни қайта критинг  </label>
      
    <?= $form->field($stuff, 'password_repeat')->passwordInput(['value'=>''])->label(false);?>
      

    </div>

                   
                                    <!-- <label>Ташкил етилган вилоят:</label> -->
                                     <?= $form->field($stuff, 'viloyat')->dropDownList(
                                           
                                           ArrayHelper::map(Viloyatlar::find()->asArray()->all(),'vil_id','viloyat'),
                                           [
                                            'prompt'=>'Вилоятни танланг ',
                                            
                                            'onchange'=>'
                                            $.get("'.Url::toRoute('stuff/lists').'",{id:$(this).val()}).done(function(data)

                                            {
                                                $("select#fil_id2").html(data);
                                            });'
                                           
                                           ]); ?>
                        
                                    <!-- <label>Туман:</label> -->
                                      <?= $form->field($stuff, 'tuman')->dropDownList(
                                          
                                          ArrayHelper::map(Filiallar::find()->asArray()->all(),'fil_id','filial'),
                                          [
                                          'prompt'=>'Туманни танланг ',
                                          'id' => 'fil_id2',
                                          
                                          ]); ?>
                 

    <div class="form-group">
        <?= Html::submitButton('Сақлаш', ['class' => 'button success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
