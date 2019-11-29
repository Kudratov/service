<?php


use yii\helpers\Html;
use yii\helpers\ArrayHelper;


use frontend\models\Company;

use frontend\models\Viloyatlar;
use frontend\models\Filiallar;
use frontend\models\Credit;
use frontend\models\User;

use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
?>



									<!-- Main content start -->
   <div class="container">
        <div class="grid">
            
            <div class="row">
               
                <div class="cell-sm-full cell-md-half cell-lg-3"><div>
                <div class="cell-sm-full cell-md-full cell-lg-full card drop-shadow mt-10">
                   
                    <div class="card-content p-2">
                        <div class="img-container">
                            <img src="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_log.png">
                        </div>
                        <form>
                            <div class="form-group">
                                <input type="text" data-role="materialinput"
                                       placeholder="Электрон почта"
                                       data-icon="<span class='mif-envelop'>"
                                       data-label="namuna@namuna.uz"
                                     
                                       data-cls-line="bg-emerald"
                                       data-cls-label="fg-emerald"
                                       data-cls-informer="fg-lightEmerald"
                                       data-cls-icon="fg-darkEmerald"
                                >
                            </div>
                            <div class="form-group">
                                <input type="password" data-role="materialinput"
                                           placeholder="ИНН(STIR)"
                                           data-icon="<span class='mif-lock'>"
                                           data-label="123456789"
                                           
                                           data-cls-line="bg-emerald"
                                           data-cls-label="fg-emerald"
                                           data-cls-informer="fg-lightEmerald"
                                           data-cls-icon="fg-darkEmerald"
                                    >
                            </div>
                            <div class="form-group">
                                <input type="checkbox" data-role="checkbox" data-caption="Remember me">
                            </div>
                            <div class="form-group d-flex flex-justify-center mb-5">
                               
                                <button class="button success outline rounded"> <span class="mif-enter"></span> Кабинетга кириш</button>
                            </div>
                        </form>
                    </div>
                   
                </div>

                </div>
               </div>
                <div class="cell-sm-full cell-md-half cell-lg-9"> 
                   <div class="  mt-10">
                    <h4> </h4>
                   </div>
                  <div></div></div>
               
            </div>
        </div>


    </div>
    <!-- Main content end -->
