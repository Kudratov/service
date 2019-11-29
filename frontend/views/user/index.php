<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Status;
use yii\helpers\Url;

//use frontend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Users';
// $this->params['breadcrumbs'][] = $this->title;
$status_Credit = 2;
$user_name= '';
$user_comp_id = '';


$co_name = '';
$co_establish_date= '';
$co_phone='';
$co_address='';
$co_okeyt='';
$co_docs='';

$cr_type = '';
$cr_cur_type = '';
$cr_summa = '';
$cr_expire_date = '';
$cr_supply='';
$cr_prosent='';
$cr_maqsad='';
 $comment_status='';

$statusCheck = Status::find()->where(['comp_inn'=>$company_inn])->all();
foreach ($statusCheck as $status ):
    $status_Credit = $status->status;
    $comment_status = $status->comment;
endforeach;
?>                                                       <?php 
        // this php form used for take all values 

        foreach ($cur_user_comp as $com_info) {
                $co_name = $com_info->name;
                $co_phone=$com_info->com_tel;
                $co_address=$com_info->com_address;
                $co_okeyt=$com_info->okeyt;
                $co_docs=$com_info->docs;
                $co_establish_date = $com_info->establish_date;            
        }

        foreach ($cur_user_cridet as $cri_info) {
                $cr_type = $cri_info->c_type;
                if($cri_info->type == 0){
                    $cr_cur_type = 'UZS';
                }
                elseif ($cri_info->type == 1 ) {
                    $cr_cur_type = 'USD';
                }
                else{
                    $cr_cur_type = 'EUR';
                }
                $cr_summa = $cri_info->summa;
                $cr_expire_date = $cri_info->expire_date;
                $cr_supply=$cri_info->supply;
                $cr_prosent=$cri_info->cr_protsent;
                $cr_maqsad=$cri_info->cr_maqsadi;
        }

    ?>

    <?php foreach($show_user as $user):?>



<style type="text/css">
    

    #bc_succ{
        background-color:#6eeb87;
        color: #fff;
    }
    #bc_pro{
         background-color:#42b7ed;
        color: #fff;
    }
    #bc_rej{
         background-color:#ff5757;
        color: #fff;
    }
</style>


     

     

     <div class="row flex-xl-nowrap  "> 
            <div class="cell-md-3 cell-xl-2 " ></div>
            <div class="cell-md-3 cell-xl-2 " >
                <div class="img-container">
        
                     <img src="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_l.png">
            </div>
            </div>
            <div class="cell-md-3 cell-xl-2 " >  </div>

             <div class="cell-md-2 cell-xl-4  text-right" > <span >  <br>
                <a class="button success outline rounded"  href="<?= Url::to(['company/create']) ?>"><span class="mif-note-add"></span>  &nbsp;Янги Ариза </a> </span>   </div>

            </div>
        <div class="row flex-xl-nowrap mt-5  "> 
            <div class="cell-md-3 cell-xl-2 " ></div>

               

                <main class="cell-md-9 cell-xl-8 order-1 pr-1-sx pl-1-sx pr-5-md pl-5-md block-shadow-impact" id="boxx">
                    <br>
                     <form>
                    <div data-role="accordion"
                         data-one-frame="false"
                         data-show-active="true"
                         data-on-frame-open="console.log('frame was opened!', arguments[0])"
                         data-on-frame-close="console.log('frame was closed!', arguments[0])">
                        <div class="frame ">
                            <div class="heading">Рахбар контакт</div>
                            <div class="content">
                                <div class="p-2">
                       

                                    <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Ф.И.О</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $user->name;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Телфон  рақам</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="+<?= $user->phone;?>" >
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Электрон почта</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $user->email;?>">
                                        </div>
                                    </div>
                                     
                            </div>
                            </div>
                        </div>
                        <div class="frame ">
                            <div class="heading">Корхона ҳақида:</div>
                            <div class="content">
                                <div class="p-2">
                                    <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Корхона ИНН</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $user->comp_inn;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right" >Корхона номи</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $co_name;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Ташкил этилган сана</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $co_establish_date;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Корхона телефон рақами</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $co_phone;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Корхона ОКЕЙТ</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $co_okeyt;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Корхона манзили</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $co_address;?>">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="frame">
                            <div class="heading">Кредит ҳақида:</div>
                            <div class="content">
                                <div class="p-2">
                                    <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Кредит тури</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $cr_type;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Сумма</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $cr_summa; ?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Берилган муддат</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?=$cr_expire_date;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Кредит таминоти </label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $cr_supply;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Кредит фоизи (%) </label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $cr_prosent;?>">
                                        </div>
                                    </div>
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Кредит мақсади </label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value="<?= $cr_maqsad;?>">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                         <div class="frame active">
                            <div class="heading">Натижалар</div>
                            <div class="content">
                                <div class="p-2">
                                    <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Ҳолати</label>
                                        <div class="cell-sm-10">
                                            <?php  if ($status_Credit == 2 ) {
                                                                             $status_Credit = "Sizning arizangiz ko'rib chqilmoqda";
                                                                              ?> <input class="form-control" type="text" id="bc_pro"readonly value=" <?=$status_Credit;?> "><?php 
                                                                            }elseif ($status_Credit == 1 ) {
                                                                             $status_Credit ="Sizning arizangiz qabul qlindi";
                                                                             ?> <input class="form-control" type="text" id="bc_succ"readonly value=" <?=$status_Credit;?> "><?php 
                                                                            }elseif($status_Credit==0

                                                                            )
                                                                            {
                                                                             $status_Credit= "Arizangiz rad etildi";
                                                                            ?>
                                                                           
                                                                             <input class="form-control" id="bc_rej" type="text" readonly value=" <?=$status_Credit;?> ">

                                                                            <?php
                                                                            }
                                                                            ?> 
                                        </div>
                                    </div>
                                      <?php  if ($status_Credit == 2 ) {
                                    $comment_status1 = "Sizning arizangiz ko'rib chqilmoqda";?> 
                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Xulosa</label>
                                        <div class="cell-sm-10">
                                            <input type="text" readonly value=" <?=$comment_status1;?> ">
                                        </div>

                                    </div>
                                     <?php 
                                        }elseif($status_Credit==0 || $status_Credit==1 )
                                         { ?>

                                     <div class="row mb-2">
                                        <label class="cell-sm-2 text-right">Xulosa</label>
                                        <div class="cell-sm-10">
                                           <textarea  type="text" readonly > <?=  $comment_status;  ?> </textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                     </form>
                    

                </main>
            </div>

        </div>
  
     <?php endforeach;?>

        <footer class="footer">
        <div class="container pt-5 pb-5">
            <div class="text-center">
                <ul class="inline-list reduce-1" id="social-menu">
                    <li><a href="https://www.facebook.com/agrobankuzbekistan"><span class="mif-facebook"></span></a></li>
                    <li><a href="https://t.me/AgrobankChannel"><span class="mif-paper-plane"></span></a></li>
                    <li><a href=https:agrobank.uz><span class="mif-ie"></span></a></li>
                    
                </ul>
            </div>

            <div class="text-center mt-2">
                
                    2005-2019 © Ru Barcha huquqlar himoyalangan va qonun muhofazasi
                    <br> ostidadir.Ushbu saytdan olingan ma'lumotlardan foydalanilganda, <a href=https:agrobank.uz>"Agrobank"</a> rasmiy saytidan <br> olinganligi ko'rsatib havola berilishi shart.</li>
                   
              
            </div>


        </div>
    </footer>











                                                    


