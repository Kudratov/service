<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Credit;
use backend\models\Company;
use backend\models\User;
use backend\models\Status;
use backend\models\Media;

use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Credit */

// $this->title = $model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Credits', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>





<div class="credit-view">
    <?php
        $checkStatusExist = 0;

        $name_of_comp = '';
        $open_date_of_comp = '';

        $co_phone='';
        $co_address='';
        $co_okeyt='';


        $me_file='';
        $me_file2='';
        $me_file3='';
        $me_file4='';
        $me_file5='';

        $name_of_owner = '';
        $owner_phone = '';
        $owner_email = '';
        $owner_address = '';

        $cr_expire_date = '';
        $cr_supply='';
        $cr_prosent='';
        $cr_maqsad='';

        $cr_status='';
       $for_stuf_info_media = Media::find()->where(['id'=>$model->company_id])->all(); 

        $for_stuf_info_com = Company::find()->where(['inn'=>$model->company_id])->all();
        $for_stuf_info_user = User::find()->where(['comp_inn'=>$model->company_id])->all();


        $for_check_status = Status::find()->where(['comp_inn'=>$model->company_id])->all();

        foreach ($for_check_status as $chec_status):
            $checkStatusExist = 1;
            $cr_status=$chec_status->comment;

        endforeach;

        foreach ($for_stuf_info_media as $for_media ):
            $me_file=$for_media->filename;
            $me_file2=$for_media->filename2;
            $me_file3=$for_media->filename3;
            $me_file4=$for_media->filename4;
            $me_file5=$for_media->filename5;

        endforeach;


        foreach ($for_stuf_info_com as $company):
            $name_of_comp = $company->name;
            $open_date_of_comp = $company->establish_date;
            $co_phone=$company->com_tel;
            $co_address=$company->com_address;
            $co_okeyt=$company->okeyt;
            $co_docs=$company->docs;

        endforeach;

        foreach ($for_stuf_info_user as $user):
            $name_of_owner = $user->name;
            $owner_phone = $user->phone;
            $owner_email = $user->email;
            $owner_address = $user->address;
        endforeach;


    ?>


    
    <?php
        $curency_type = '';

     if($model->type == 0){
        $curency_type = 'UZS';
        }
    elseif($model->type == 1)
    {
        $curency_type = 'USD';
    }else{
        $curency_type = 'EURO';
    }

        ?>
    

    <p hidden>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    


<div class="container-fluid">

    <div class="row flex-xl-nowrap">
       

            <div class="d-none d-block-xl cell-xl-2 order-1 border-right bd-light toc-wrapper">
                <h5><a href="https://agrobank.uz"><img src="/images/logo/logo_l.png" width="200px"></a></h5>
                <hr/>
                 <div class="doc-nav-item mb-2">
                    <a href="<?= Url::to(['credit/index']) ?>"><span class="mif-home icon"></span>  Бош сахифа</a>
                    
                </div>

            </div>
           
            <main class="cell-md-9 cell-xl-8 order-2 pr-1-sx pl-1-sx pr-5-md pl-5-md remark success">
                

                <h1 class="display2"><small>Корхона номи: </small><?= $name_of_comp;?>    <button class="button success  outline rounded place-right mt-5" onclick="print_div();"><span class="mif-printer mif-2x"></span> </button> <hr></h1>
               
                    <div class="row mb-2">
                        <label class="cell-sm-2">Корхона эгаси Ф.И.О</label>
                        <div class="cell-sm-10">
                            <input type="text"  readonly=""  value="<?= $name_of_owner;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Телфон  рақам</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $owner_phone;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Электрон почта</label>
                        <div class="cell-sm-10">
                            <input type="text"  readonly="" value="<?= $owner_email;?>">
                        </div>
                    </div>

                     <div class="row mb-2">
                        <label class="cell-sm-2">Корхона ИНН</label>
                        <div class="cell-sm-10">
                            <input type="text"  readonly="" value="<?= $model->company_id;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Корхона номи</label>
                        <div class="cell-sm-10">
                            <input type="text"  disabled  value="<?= $name_of_comp;?>">
                        </div>
                    </div> <div class="row mb-2">
                        <label class="cell-sm-2">Ташкил этилган сана</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?=$open_date_of_comp ;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Корхона телефон рақами</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $co_phone;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Корхона ОКЕЙТ</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $co_okeyt;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Корхона манзили</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $co_address;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Кредит тури</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly=""  value="<?= $model->c_type;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Сумма</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value=" <?= $model->summa;?> <?= $curency_type?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Берилган муддат</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $model->expire_date;?> ой">
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="cell-sm-2">Кредит таминоти</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?=  $model->supply;?>">
                        </div>
                    </div>
                     <div class="row mb-2">
                        <label class="cell-sm-2">Кредит фоизи (%)</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?=  $model->cr_protsent; ?> %">
                        </div>
                    </div> 
                    <div class="row mb-2">
                        <label class="cell-sm-2">Кредит мақсади</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?= $model->cr_maqsadi;?>">
                        </div>
                    </div>
                    
                     <div class="row mb-2">
                        <label class="cell-sm-2">Гувоҳнома</label>
                        <div class="cell-sm-8">
                            <input type="text" readonly="" value="<?= $me_file;?>">
                        </div>
                         <div class="cell-sm-2">
<?php

foreach($for_stuf_info_media as $media){


    ?>
    
    <?php  Yii::getAlias('@web').'/'.$media->filepath; 
    
    
    
    
    
     echo Html::a(' <span class="mif-download ani-hover-horizontal">  Юклаб олиш </span>',['download','id'=>$media->id],['class'=>'button success']);
    
    
} ?>


                        </div>
                    </div>



                    <div class="row mb-2">
                        <label class="cell-sm-2">Корхона рахбари Паспорти</label>
                        <div class="cell-sm-8">
                            <input type="text" readonly="" value="<?= $me_file2; ?>">
</div>
 <div class="cell-sm-2">
<?php

foreach($for_stuf_info_media as $media2){


    ?>
    
    <?php  Yii::getAlias('@web').'/'.$media2->filepath2; 
    
    
    
    
    
     echo Html::a('<span class="mif-download ani-hover-horizontal">  Юклаб олиш </span>',['downloadx','id'=>$media2->id],['class'=>'button success']);
    
    
} ?>


                        </div>
                    </div>


                    <div class="row mb-2">
                        <label class="cell-sm-2">Буйруқ</label>
                        <div class="cell-sm-8">
                            <input type="text" readonly="" value="<?= $me_file3;?>">
</div> <div class="cell-sm-2">
<?php

foreach($for_stuf_info_media as $media3){


    ?>
    
    <?php  Yii::getAlias('@web').'/'.$media3->filepath3; 
    
    
    
    
    
     echo Html::a('<span class="mif-download ani-hover-horizontal">  Юклаб олиш </span>',['downloady','id'=>$media3->id],['class'=>'button success']);
    
    
} ?>


                        </div>
                    </div>


                    <div class="row mb-2">
                        <label class="cell-sm-2">Молиявий натижалар</label>
                        <div class="cell-sm-8">
                            <input type="text" readonly="" value="<?= $me_file4;?>">
</div> <div class="cell-sm-2">
<?php

foreach($for_stuf_info_media as $media4){


    ?>
    
    <?php  Yii::getAlias('@web').'/'.$media4->filepath4; 
    
    
    
    
    
     echo Html::a('<span class="mif-download ani-hover-horizontal">  Юклаб олиш </span>',['downloada','id'=>$media4->id],['class'=>'button success']);
    
    
} ?>


                        </div>
                    </div>


<div class="row mb-2">
                        <label class="cell-sm-2">Таъсис ҳужжатлар </label>
                        <div class="cell-sm-8">
                            <input type="text" readonly="" value="<?= $me_file5;?>">
</div> <div class="cell-sm-2">
<?php

foreach($for_stuf_info_media as $media5){


    ?>
    
    <?php  Yii::getAlias('@web').'/'.$media5->filepath5; 
    
    
    
    
    
     echo Html::a('<span class="mif-download ani-hover-horizontal">  Юклаб олиш </span>',['downloadb','id'=>$media5->id],['class'=>'button success']);
    
    
} ?>


                        </div>
                    </div>








                        <?php if($checkStatusExist == 2 || $checkStatusExist == 1) { ?>

                     <div class="row mb-2">
                        <label class="cell-sm-2">Ҳолати</label>
                        <div class="cell-sm-10">
                            <input type="text" readonly="" value="<?=  $cr_status; ?>">
                        </div>
                    </div> <?php } ?>

                                               <?php if($checkStatusExist == 0){?>
    <div >
        <?php $form = ActiveForm::begin();?> 
        <hr>
                 <div class="row mb-2">
                        <label class="cell-sm-2">Хулоса</label>
                        <div class="cell-sm-10">
                             <?= $form->field($saveStatus, 'comment')->textArea(['rows'=>'3'])->label(false);?>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="cell-sm-2">Ҳолати</label>
                        <div class="cell-sm-10">
                             <?= $form->field($saveStatus, 'status')->radioList(['1'=>'Розиман', '0'=>'Норозиман'])->label(false);?>
                        </div>
                    </div>

                       <div hidden >  
                <?= $form->field($saveStatus, 'stuff_id')->textInput(['readonly' => true, 'value' => $cur_stuff]) ?>
                <?= $form->field($saveStatus, 'comp_inn')->textInput(['readonly' => true, 'value' => $model->company_id]) ?>
                <?= $form->field($saveStatus, 'credit_id')->textInput(['readonly' => true, 'value' => $model->id]) ?>
                <?= $form->field($saveStatus, 'open_status')->textInput(['readonly' => true, 'value' => '1']) ?>
                </div>
                    <div class="row mb-2">
                         <label class="cell-sm-2"></label>
                        <div class="cell-sm-10">
                              <?= Html::submitButton('Yuklash', ['class' => 'button success']) ?>
                        </div>
                    </div>
            
                
                    
                

             



                  
               
        <?php ActiveForm::end(); ?>
    </div>
<?php }elseif ($checkStatusExist) {
    echo ' ';
}

?>
                    
                    
              <form HIDDEN id="print_div"> 

                 <h1 class="display2"><small>Корхона номи: </small><?= $name_of_comp;?>    <hr></h1>
   
               <p><b> Корхона эгаси Ф.И.О:</b> <?= $name_of_owner;?></p>
               <p><b> Телфон  рақам: </b> <?= $owner_phone;?> </p>
               <p><b> Электрон почта:</b> <?= $owner_email;?> </p>
               <p><b> Корхона ИНН: </b><?= $model->company_id;?></p>
               <p><b> Корхона номи: </b><?= $name_of_comp;?></p>
               <p><b> Ташкил этилган сана: </b><?=$open_date_of_comp ;?></p>               
               <p><b> Корхона телефон рақами:  </b><?= $co_phone;?></p>               
               <p><b> Корхона ОКЕЙТ:  </b> <?= $co_okeyt;?></p>               
               <p><b> Корхона манзили: </b> <?= $co_address;?></p>               
               <p><b> Кредит тури: </b> <?= $model->c_type;?> </p>               
               <p><b> Кредит таминоти: </b> <?=  $model->supply;?></p>               
               <p><b> Кредит фоизи: </b> <?=  $model->cr_protsent; ?> %</p>               
               <p><b> Сумма:  </b> <?= $model->summa;?> <?= $curency_type?></p>
               <p><b> Берилган муддат: </b><?= $model->expire_date;?> ой</p>               
               <p><b> Кредит мақсади: </b> <?= $model->cr_maqsadi;?></p>               
               <!-- <p><b> Гувоҳнома: </b> <?= $me_file;?></p>                -->
               <p><b> Хулоса: </b> <?=  $cr_status; ?></p>
              
            </form>
                
            </main>
        </div>

    </div>

                            <div hidden>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'company_id',
            'c_type',
            'viloyat',
            'fillial',
            'type',
            'summa',
            'expire_date',
            'supply',
        ],
    ]) ?>
</div>

<script>
function myFunction() {
  window.print();
}
function print_div()
{

 var printContent = document.getElementById('print_div');
 var WinPrint = window.open('', '', '');
 WinPrint.document.write(printContent.innerHTML);
 WinPrint.document.close();
 WinPrint.focus();
 WinPrint.print();
 WinPrint.close();
}
</script>