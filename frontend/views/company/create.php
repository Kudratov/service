<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\Company;
use frontend\models\Media;
use frontend\models\Viloyatlar;
use frontend\models\Filiallar;
use frontend\models\Credit;
use frontend\models\User;
use kartik\select2\Select2;
use kartik\widgets\DepDrop;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\controllers\CompanyController;
use yii\helpers\Url;
/* @var $this yii\web\View */

?>

 <div class="container-fluid">
            <div class="container-fluid bg-emerald fg-white pos-fixed fixed-top z-top">
        <header class="app-bar container bg-emerald fg-white pos-relative app-bar-expand" data-role="appbar" data-expand-point="md" id="app-bar-156655019999672" data-role-appbar="true">
            <button type="button" class="hamburger menu-down hidden">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="text-center">
                    <ul class="inline-list reduce-1" id="footer-menu">
                        <li><i class="mif-phone"></i><span class="text-nowrap"> (0 371) 203 88 88 </li>
                        <li><i class="mif-my-location"></i> 100096, Toshkent shahri, Muqimiy ko'chasi 43-uy</li>
                        <li><i class="mif-envelop"></i> headoffice@agrobank.uz </li>
                       
                                       
                    </ul>
                </div>
                 
                    <ul class="app-bar-menu ml-auto   " id="footer-menu">
                        <li >
                            <span href="#" class="dropdown-toggle">UZB</span>
                            <ul class="d-menu" data-role="dropdown">
                                <li><a href="#">UZ</a></li>
                                <li><a href="#">EN</a></li>
                                <li><a href="#">RU</a></li>
                            </ul>
                        </li>
                                       
                    </ul>
              
                    

                
                        
                       
                  
        </header>
    </div>

     <div class="row flex-xl-nowrap  "> 
            <div class="cell-md-3 cell-xl-2 " ></div>
            <div class="cell-md-3 cell-xl-2 " >
                <div class="img-container">
        
                     <img src="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_l.png">
            </div>
            </div>
            <div class="cell-md-3 cell-xl-2 " >  </div>

             <div class="cell-md-2 cell-xl-4  text-right" > <span >  <br>
              <a class="button success outline rounded" href="<?= Url::to(['site/login']) ?>"><span class="mif-enter"></span>  &nbsp;Кабинетга кириш</a> </span>   </div>

            </div>
        <div class="row flex-xl-nowrap mt-5  "> 
            <div class="cell-md-3 cell-xl-2 " ></div>

               

                <main class="cell-md-9 cell-xl-8 order-1 pr-1-sx pl-1-sx pr-5-md pl-5-md block-shadow-impact" id="boxx">
                    

                    <br>
                         <?php $form = ActiveForm::begin([ 
                               'id' => 'kt_form',
                               'options' => [ 'enctype'=>'multipart/form-data']]); ?>
                   
                    <div data-role="wizard" style="height: auto!important;" data-finish="3" data-button-mode="button"

     data-icon-prev="<span>Аввалги</span>"
     data-icon-next="<span>Кейинги</span>"
     data-icon-finish="<span>Аризани юбориш  <span class='mif-arrow-right'> </span> </span>">
                        <section style="height: auto!important;">
                            <div class="page-content"  >
                       <h4 class="text-center">Корхона ҳақида</h4><hr>
                            
                             <?= $form->field($company, 'name')->textInput(['maxlength' => 255, 'class' => 'form-control success required']) ?>
                              
                            <div class="row mb-3 mt-2">

                            <div class="cell-md-6">
                                <?= $form->field($company, 'inn')->textInput(['type' => 'number',   'minlength'=>9, 'maxlength'=>9,'class'=>'success']) ?>
                            </div>

                            <div class="cell-md-6">
                                <?= $form->field($company, 'establish_date')->textInput(['data-role'=>'calendarpicker', 'data-format'=>'%d/%m/%Y',  'data-locale'=>'uz-UZ', 'placeholder' => \Yii::t('app', 'кун/ой/йил')]) ;?>
                            </div>
                        </div>
                          <fieldset style="border:1px solid #60a917;" class="pl-2 pr-2 mb-3">
                               <legend> &nbsp;Корхона манзили: &nbsp;</legend>
                        <div class="row mb-3 mt-2">

                            <div class="cell-md-6">
                                <?= $form->field($company, 'viloyat')->dropDownList(
                                           
                                           ArrayHelper::map(Viloyatlar::find()->asArray()->all(),'vil_id','viloyat'),
                                           [
                                            'prompt'=>'Вилоятни танланг',
                                            'class'=>'success',
                                            
                                            'onchange'=>'
                                            $.get("'.Url::toRoute('company/lists').'",{id:$(this).val()}).done(function(data)

                                            {
                                                $("select#fil_id2").html(data);
                                            });'
                                           ]); ?>
                            </div>
                            <div class="cell-md-6">
                                
                                           <?= $form->field($company, 'tuman')->dropDownList(
                                          
                                          ArrayHelper::map(Filiallar::find()->asArray()->all(),'fil_id','filial'),
                                          [
                                          'prompt'=>'Туманни танланг ',
                                          'id' => 'fil_id2',
                                          'class'=>'success',
                                          
                                          
                                          ]); ?>
                            </div>
                        </div>
                         <?= $form->field($company, 'com_address')->textarea(['class'=>'success','rows' => '2']) ?> 
                             </fieldset>
                              
                              <?= $form->field($company, 'com_tel')->textInput(['maxlength' => 255, 'class' => 'form-control success'])->textInput(['maxlength' => 255, 'class' => 'form-control'])->widget(\yii\widgets\MaskedInput::className(), [
                                  'name' => 'input-5',
                                  'mask' => ['+999-99-999-9999']
                              ]); ?>      
                               <?= $form->field($company, 'okeyt')->textInput(['maxlength' => 255, 'class' => 'form-control success']) ?>
                               
                                <div class="row mb-3 mt-2">
                                  <div class="cell-md-4">
                                    <?= $form->field($media, 'filename')->fileInput(['class'=>'success','type'=>'file', 'data-role'=>'file', 'data-button-title'=>'...']) ?> 
                                  </div>
                                  <div class="cell-md-4">
                                      <?= $form->field($media, 'filename2')->fileInput(['class'=>'success','type'=>'file', 'data-role'=>'file', 'data-button-title'=>'...']) ?>
                                  </div>
                                  <div class="cell-md-4">
                                    <?= $form->field($media, 'filename3')->fileInput(['class'=>'success','type'=>'file', 'data-role'=>'file', 'data-button-title'=>'...']) ?>
                                  </div>

                                  <div class="cell-md-4">
                                    <?= $form->field($media, 'filename4')->fileInput(['class'=>'success','type'=>'file', 'data-role'=>'file', 'data-button-title'=>'...']) ?>
                                  </div>

                                  <div class="cell-md-4">
                                    <?= $form->field($media, 'filename5')->fileInput(['class'=>'success','type'=>'file', 'data-role'=>'file', 'data-button-title'=>'...']) ?>
                                  </div>

                                </div>

                                 

                                

                                
                                
                        <br>
                            </div>
                        </section>
                        <!-- page 1 end -->
                        <section>
                            <div class="page-content">
                                
                         <h4 class="text-center"> Кредит буюртмаси ҳақида</h4><hr>



                          <?= $form->field($credit, 'c_type')->dropDownList(
                                    [
                                        'Germaniyaning “LANDESBANK” BW va “COMMERZBANK” AG kredit liniyalari'=>'Germaniyaning “LANDESBANK” BW va “COMMERZBANK” AG kredit liniyalari',
                                        'Tomchilatib sugorish ishlarini tashkil etish uchun kredit'=> 'Tomchilatib sugorish ishlarini tashkil etish uchun kredit',
                                        'Investitsion loyihalarni moliyalashtirish'=>'Investitsion loyihalarni moliyalashtirish',
                                        'Yosh tadbirkorlarga imtiyozli kreditlar'=>'Yosh tadbirkorlarga imtiyozli kreditlar',
                                        'Investitsion loyihalarni moliyalashtirish'=>'Investitsion loyihalarni moliyalashtirish',
                                        'Jalb etilgan kredit liniyalari doirasida milliy hamda chet el valyutasida ajratiladigan kreditlar'=>'Jalb etilgan kredit liniyalari doirasida milliy hamda chet el valyutasida ajratiladigan kreditlar',
                                        'Kichik biznes subyektlarini kreditlash'=>'Kichik biznes subyektlarini kreditlash',
                                        'Savdo korxonalarini kreditlash'=>'Savdo korxonalarini kreditlash',
                                        'Qishloq xo’jalik korxonalarini kreditlash'=>'Qishloq xo’jalik korxonalarini kreditlash',
                                        'Korporativ mijozlarni kreditlash'=>'Korporativ mijozlarni kreditlash',
                                        'Oilaviy tadbirkorlikni rivojlantirish uchun kredit'=>'Oilaviy tadbirkorlikni rivojlantirish uchun kredit',
                                        'Hunarmandchilik faoliyati subektlariga imtiyozli mikrokreditlar'=>'Hunarmandchilik faoliyati subektlariga imtiyozli mikrokreditlar'


                                    ],['class'=>'success', 'prompt'=>'Танланг']


                            ) ?>
                             <div class="row mb-3 mt-2">

                            <div class="cell-md-6">
                                  <?= $form->field($credit, 'expire_date')->textInput(['class'=>'success', 'type' => 'number', 'minlength'=>1, 'maxlength'=>3])?>
                            </div>
                             
                            <div class="cell-md-6">
                                 <?= $form->field($credit, 'cr_protsent')->textInput(['class'=>'success', 'type' => 'number', 'minlength'=>1, 'maxlength'=>3]) ?>
                            </div>
                        </div>


                            <div class="row mb-3 mt-2">

                            <div class="cell-md-6">
                                <?= $form->field($credit, 'viloyat')->dropDownList(
                                           
                                           ArrayHelper::map(Viloyatlar::find()->asArray()->all(),'vil_id','viloyat'),
                                           [
                                            'prompt'=>'Вилоятни танланг ',
                                            'class'=>'success',
                                             
                                            'onchange'=>'
                                           $.get("'.Url::toRoute('company/lists').'",{id:$(this).val()}).done(function(data)

                                            {
                                                $("select#fil_id").html(data);
                                            });'
                                           ]); ?>
                                           <!-- <label>Енг яқин филиал:</label> -->
                            </div>
                             
                            <div class="cell-md-6">
                                <?= $form->field($credit, 'fillial')->dropDownList(
        
                                      ArrayHelper::map(Filiallar::find()->asArray()->all(),'fil_id','filial'),
                                      ['class'=>'success',
                                       
                                      'prompt'=>'танланг',
                                      'id' => 'fil_id'
                                      ]); ?>
                            </div>
                        </div>

                                 <?= $form->field($credit, 'summa')->textInput([ 'class'=>'success'])->widget(\yii\widgets\MaskedInput::className(), [
                                     'name' => 'input-33',

                                    'clientOptions' => [
                                        'alias' =>  'decimal',
                                        'groupSeparator' => ',',
                                        'autoGroup' => true
                                    ],
                                ]) ?> 
                         
                                <?= $form->field($credit, 'type')->radioList( [0=>' UZD (Сўм) ', 1 => ' USD (АҚШ доллари) ', 2 => ' EUR (Евро) '] ); ?>
                           
                             
                                 

                                      
                               
                             
                              <?= $form->field($credit, 'supply')->textInput(['maxlength' => 255,  'class' => 'form-control success']) ?>
                             <div class="row mb-3 mt-2">

                            <div class="cell-md-12">
                               <?= $form->field($credit, 'cr_maqsadi')->textarea(['rows' => '3','placeholder'=>'Кредит мақсади тўғрисида тўлиқ ёзинг...',  'class' => 'form-control success']) ?>
                                <em class="text-leader3">Лойиҳанинг умумий қиймати; Шундан корхона ўз улуши; Банк кредити ҳисобидан; Лойиҳа ишга тушадиган сана; Яратиладиган иш ўрни...</em>
                           </div>
                         </div>
                            <br>
                            
                        </section>
                        <!-- page 2 end --> 
                        <section>
                            <div class="page-content">
                               
                         <h4 class="text-center">Рахбар контакт</h4><hr>

                          <?= $form->field($user, 'name') ?>
                          <?= $form->field($user, 'phone')->widget(\yii\widgets\MaskedInput::className(), [ 'name' => 'input-1',
                              'mask' => '(+999)-99-999-9999',
                          ])->textInput([ ]); ?>
                          <?= $form->field($user, 'email')->widget(\yii\widgets\MaskedInput::className(), [
                              'name' => 'input-36',
                              'clientOptions' => [
                                  'alias' =>  'email'
                              ],
                          ]) ?>
                          
                             
                            <br>
                            
                        </section> 

                        <!-- page 3 end -->

                    </div>  
                        <?php ActiveForm::end(); ?>
                        

                </main>
            </div>

        </div>
        <span class="footer">
        <div class="container pt-5 pb-5">
            <div class="text-center">
                <ul class="inline-list reduce-1" id="social-menu">
                    <li><a href="https://www.facebook.com/agrobankuzbekistan"><span class="mif-facebook"></span></a></li>
                    <li><a href="https://t.me/AgrobankChannel"><span class="mif-paper-plane"></span></a></li>
                    <li><a href=https:agrobank.uz><span class="mif-ie"></span></a></li>
                    
                </ul>
            </div>

            <div class="text-center mt-2">
                
                    2005-2019 ©  Barcha huquqlar himoyalangan va qonun muhofazasi
                    <br> ostidadir. Ushbu saytdan olingan ma'lumotlardan foydalanilganda, <a href=https:agrobank.uz>"Agrobank"</a> rasmiy saytidan <br> olinganligi ko'rsatib havola berilishi shart.</li>
                   
              
            </div>


        </div>
    </span>

        <script src="docsearch/docsearch.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="metro/js/metro.js?ver=@@b-version"></script>
        <script src="highlight/highlight.pack.js"></script>
        <script src="js/clipboard.min.js"></script>
        <script src="js/holder.min.js"></script>
        <script src="js/site.js"></script>
      


<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  </script> -->

        


        
    
      
                                           
        
        
        
       


    
        











