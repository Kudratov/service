<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

   $this->title = 'Admin login - Online Ariza';
// $this->params['breadcrumbs'][] = $this->title;
?>

   <!-- Main content start -->
   <div class="container">
        <div class="grid">
            
            <div class="row">
               
                <div class="cell-sm-full cell-md-half cell-lg-3"><div>
                <div class="cell-sm-full cell-md-full cell-lg-full card drop-shadow mt-10">
                   
                    <div class="card-content p-2">
                        <div class="img-container">
                            <img src="/images/logo/logo_log.png">
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <div class="form-group">
                               <?= $form->field($model, 'username')->textInput(['type'=>'text', 'data-role'=>'materialinput',
                                 'placeholder'=>'Логин', 
                                 'data-icon'=> '<span class="mif-envelop">',
                                'data-label'=>'Логинни киритинг', 
                                'data-informer'=>'Мисол: Agrobank', 
                                'data-cls-line'=>'bg-emerald',
                                'data-cls-label'=>'fg-emerald',
                                'data-cls-informer'=>'fg-lightEmerald',
                                'data-cls-icon'=>'fg-darkEmerald',])->label(false); ?>
                               
                            </div>
                            <div class="form-group">
                                 <?= $form->field($model, 'password')->passwordInput(['type'=>'password', 'data-role'=>'materialinput',
                                 'placeholder'=>'Парол', 
                                 'data-icon'=> '<span class="mif-lock">',
                                'data-label'=>'Паролни киритинг', 
                                'data-informer'=>'Мисол: ******', 
                                'data-cls-line'=>'bg-emerald',
                                'data-cls-label'=>'fg-emerald',
                                'data-cls-informer'=>'fg-lightEmerald',
                                'data-cls-icon'=>'fg-darkEmerald',])->label(false); ?>
                                
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-role="checkbox" data-caption="Мени эслаб қол! ">
                            </div>
                            <div class="form-group d-flex flex-justify-center mb-5">
                               <?= Html::submitButton('Кабинетга кириш', ['class' => 'button success outline rounded', 'name' => 'login-button']) ?>
                               

                            </div>
                       <?php ActiveForm::end(); ?>
                    </div>
                   
                </div>

                </div>
               </div>
                <div class="cell-sm-full cell-md-half cell-lg-9"><div></div></div>
               
            </div>
        </div>


    </div>
    <!-- Main content end -->





