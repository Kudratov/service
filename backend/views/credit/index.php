<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Status;
use backend\models\Credit;
use backend\models\Stuff;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аризалар - Online Ariza';?>
 <?php 
        $stuff = New Stuff();
        $user_name = Yii::$app->user->identity->username;
       // $stuff_name = $stuff->find()->where([''])
    ?>
<?php 

$inf_stats = Status::find()->where(['stuff_id'=>$cur_stuff])->count();
$deftaul_stats=  Credit::find()->andWhere(['viloyat'=>$stuff_vil ])->andWhere([ 'fillial'=>$stuff_tum])->count();

 ?>
 <div class="container-fluid bg-emerald fg-white pos-fixed fixed-top z-top">
        <header class="app-bar container bg-emerald fg-white pos-relative app-bar-expand" data-role="appbar" data-expand-point="md" id="app-bar-156655019999672" data-role-appbar="true">
            <button type="button" class="hamburger menu-down hidden">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="text-center">
                    <ul class="inline-list reduce-1" id="footer-menu">
                        <li><span class="text-nowrap"> AGROBANK ATB</li>
                       
                       
                                       
                    </ul>
                </div>
                 
                    <ul class="app-bar-menu ml-auto   " id="footer-menu">
                         <li>  <a href="<?= Url::to(['credit/index']) ?>" class="no-hover">Янги аризалар <span class="badge inline bg-red fg-white"><?= $deftaul_stats-$inf_stats;?></span></a></li>
                        <li >
                            <span href="#" class="dropdown-toggle">UZB</span>
                            <ul class="d-menu" data-role="dropdown">
                                <li><a href="#">UZ</a></li>
                                <li><a href="#">EN</a></li>
                                <li><a href="#">RU</a></li>
                            </ul>
                        </li>
                                       

                        <li >
                            <span href="#" class="dropdown-toggle"><i class="mif-user"></i>&nbsp;  <?=$user_name?></span>
                            <ul class="d-menu" data-role="dropdown">
                                <li><a href="#"><i class="mif-import-contacts"></i> &nbsp;Natijalar</a></li>
                                <li><a href="#"><i class="mif-cogs"></i> &nbsp;Sozlash</a></li>
                                <li class="divider bg-lightGray"></li>
                                <li> <?=  Html::a('<i class="mif-exit"></i> Chiqish', ['/site/logout'], ['data-method' => 'post']) ?></li>


                            </ul>
                        </li>
                                       
                    </ul>
              
                    

                
                        
                       
                  
        </header>
    </div>

<div class="container-fluid">

    <div class="row flex-xl-nowrap">
       

            <div class="d-none d-block-xl cell-xl-2 order-1 border-right bd-light toc-wrapper">
                <h5><a href="https://agrobank.uz"><img src="/images/logo/logo_l.png" width="200px"></a></h5>
                <hr/>
          


    <div class="doc-nav-item mb-2">
        <a href="<?= Url::to(['credit/index']) ?>"><span class="mif-home icon"></span>  Бош сахифа</a>
        
    </div>
   <!--  <div class="doc-nav-item mb-2">
        <a href="<?= Url::to(['credit/index']) ?>"><span class="mif-leanpub icon"></span>  Янги аризалар <span class="badge inline bg-red fg-white"><?= $deftaul_stats-$inf_stats;?></span></a>
        
    </div> -->
    


            </div>
           
            <main class="cell-md-12 cell-xl-10 order-2 pr-1-sx pl-1-sx pr-5-md pl-5-md">
                
<p> 

    


</p>
                <h1>Аризалар</h1>
                
                
            




                    <?= GridView::widget([  
                                            'dataProvider' => $dataProvider,
                                            'filterModel' => $searchModel,
                                            'columns' => [
                                                ['class' => 'yii\grid\SerialColumn'],

                                                // 'id',
                                                //'user_id',

                                                'company_id',
                                                'c_type',
                                                // 'viloyat',
                                                //'fillial',
                                                //'type',
                                                'summa',
                                                //'expire_date',
                                                //'supply',
                                                

                                                ['class' => 'yii\grid\ActionColumn','template' => '{view}',],
                                            ],'options'=>['class'=>'grid-view gridview-newclass'],
                                        ]); ?>

                                        </main>
        </div>

    </div>

                                 
