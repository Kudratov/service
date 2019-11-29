<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Status;
use backend\models\Credit;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\StuffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Stuffs';
// $this->params['breadcrumbs'][] = $this->title;
?>

<?php 

//$inf_stats = Status::find()->where(['stuff_id'=>$cur_stuff])->count();

$allCred=Credit::find()->count();
$all_chec_Cred=Status::find()->count();

$tashCred=Credit::find()->where(['viloyat'=>1 ])->count();
$tash_chec_Cred=Status::find()->where(['stuff_id'=>[1,107,109,113,118,120,124,128,132,134,136,138,178] ])->count();

$sirCred=Credit::find()->where(['viloyat'=>2 ])->count();
$sir_chec_Cred=Status::find()->where(['stuff_id'=>[167,168,169,170,171,172,173,174,175,176,177] ])->count();

$jizCred=Credit::find()->where(['viloyat'=>3 ])->count();
$jiz_chec_Cred=Status::find()->where(['stuff_id'=>[4,9,13,19,21,24,27,32,38,44,47,49] ])->count();

$samCred=Credit::find()->where(['viloyat'=>4 ])->count();
$sam_chec_Cred=Status::find()->where(['stuff_id'=>[92,95,96,97,98,99,100,101,102,103,104,106,112,114,116,121,123] ])->count();

$farCred=Credit::find()->where(['viloyat'=>5 ])->count();
$far_chec_Cred=Status::find()->where(['stuff_id'=>[144,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166] ])->count();

$namCred=Credit::find()->where(['viloyat'=>6 ])->count();
$nam_chec_Cred=Status::find()->where(['stuff_id'=>[78,79,80,81,82,83,84,85,86,87,88,89,90,91] ])->count();

$andCred=Credit::find()->where(['viloyat'=>7 ])->count();
$and_chec_Cred=Status::find()->where(['stuff_id'=>[6,15,18,20,22,25,28,31,33,34,35,36,41,43,46] ])->count();

$qashCred=Credit::find()->where(['viloyat'=>8 ])->count();
$qash_chec_Cred=Status::find()->where(['stuff_id'=>[39,40,42,45,48,51,54,57,58,60,62,64,66,68] ])->count();

$surCred=Credit::find()->where(['viloyat'=>9 ])->count();
$sur_chec_Cred=Status::find()->where(['stuff_id'=>[105,108,110,111,115,117,119,122,125,126,127,130,133] ])->count();

$buxCred=Credit::find()->where(['viloyat'=>10 ])->count();
$bux_chec_Cred=Status::find()->where(['stuff_id'=>[50,52,53,55,56,59,61,63,65,67,69,70] ])->count();

$navCred=Credit::find()->where(['viloyat'=>11 ])->count();
$nav_chec_Cred=Status::find()->where(['stuff_id'=>[71,72,73,74,75,76,77] ])->count();

$xorCred=Credit::find()->where(['viloyat'=>12 ])->count();
$xor_chec_Cred=Status::find()->where(['stuff_id'=>[129,131,135,137,139,140,141,142,143,145,146,147,148] ])->count();

$qorCred=Credit::find()->where(['viloyat'=>13 ])->count();
$qor_chec_Cred=Status::find()->where(['stuff_id'=>[2,3,5,7,8,10,11,12,14,16,17,23,26,29,30,37] ])->count();


 ?>

<div class="container-fluid">

    <div class="row flex-xl-nowrap">
       

            <div class="d-none d-block-xl cell-xl-2 order-1 border-right bd-light toc-wrapper">
                <h5><a href="https://agrobank.uz"><img src="/images/logo/logo_l.png" width="200px"></a></h5>
                <hr/>

                <div data-role="accordion" data-one-frame="true" data-show-active="true">
    <div class="frame active">
        <div class="heading">Барча аризалар: <?= $allCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $all_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $allCred-$all_chec_Cred ?></li>
        </ul>
        </div>
    </div>
    <div class="frame">
    <div class="heading">Тошкент вилояти: <?= $tashCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $tash_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $tashCred-$tash_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Сирдарё вилояти: <?= $sirCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $sir_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $sirCred-$sir_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Жиззах вилояти: <?= $jizCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $jiz_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $jizCred-$jiz_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Самарқанд вилояти: <?= $samCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $sam_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $samCred-$sam_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Фарғона вилояти: <?= $farCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $far_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $farCred-$far_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Наманган вилояти: <?= $namCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $nam_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $namCred-$nam_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Андижон вилояти: <?= $andCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $and_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $andCred-$and_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Қашқадарё вилояти: <?= $qashCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $qash_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $qashCred-$qash_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Сурхондарё вилояти: <?= $surCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $sur_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $surCred-$sur_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Бухоро вилояти: <?= $buxCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $bux_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $buxCred-$bux_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Навоий вилояти: <?= $navCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $nav_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $navCred-$nav_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Хоразм вилояти: <?= $xorCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $xor_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $xorCred-$xor_chec_Cred ?></li>
        </ul>
        </div>
    </div>

    <div class="frame">
    <div class="heading">Қорақалпогистон: <?= $qorCred ?></div>
        <div class="content">
        <ul class="toc-nav">
        <li class="badge inline bg-green fg-white">Кўриб чиқилган: <?= $qor_chec_Cred ?></li>
        <li class="badge inline bg-red fg-white">Кўриб чиқилмаган: <?= $qorCred-$qor_chec_Cred ?></li>
        </ul>
        </div>
    </div>

</div>


            </div>
           
            <main class=" cell-xl-10 order-1 pr-1-sx pl-1-sx pr-5-md pl-5-md remark success">
                

                <h1 class="display2"><div class="d-flex flex-justify-end">
                <div class="mr-auto"><small>Барча ходимлар </small> </div>
                <div><?php if($cur_stuff==1){
                        ?>
                            <?= Html::a(' <span class="mif-user-plus"></span> Ҳодим яратиш', ['create'], ['class' => 'button success ']) ?>

                    <?php
                    }else{
                        echo ' ';
                    } ?>
            </div>
                
            </div>

                
                    

                 <hr></h1>
                <?php Pjax::begin(); ?>
                 <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                             'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],

                                // 'id',
                                'name',
                                
                                // 'contact',
                                'username',
                                'password',
                               ['attribute'=>'viloyat',
                                'value'=> 'viloyatlar.viloyat',
                                 ],
                                'tuman',

                                ['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]); ?>

                <?php Pjax::end(); ?>
              
                
            </main>
        </div>

    </div>
