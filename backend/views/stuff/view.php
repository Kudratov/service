<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use backend\models\Status;
use backend\models\Stuff;
use backend\models\Credit;
/* @var $this yii\web\View */
/* @var $model backend\models\Stuff */

$this->title = $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php 
$staffId=$model->id;

         $stuff_vil='';
         $stuff_tum= '';
         
         $inf_stuff = Stuff::find()->where(['id'=>$staffId])->all();
         foreach ($inf_stuff as $inf_stuffs) {
            $stuff_vil = $inf_stuffs->viloyat;
            $stuff_tum = $inf_stuffs->tuman;
            
         }

$inf_stats = Status::find()->where(['stuff_id'=>$staffId])->count();
$deftaul_stats=  Credit::find()->andWhere(['viloyat'=>$stuff_vil ])->andWhere([ 'fillial'=>$stuff_tum])->count();

 ?>


<div class="container-fluid">

    <div class="row flex-xl-nowrap">
       

            <div class="d-none d-block-xl cell-xl-2 order-1 border-right bd-light toc-wrapper">
                <h5><a href="https://agrobank.uz"><img src="/images/logo/logo_l.png" width="200px"></a></h5>
                <hr/>
                <ul class="toc-nav">
                    <li class="toc-entry"><a href="<?= Url::to(['credit/index']) ?>">Бош сахифа</a></li>
                    
                </ul>

            </div>
           
            <main class="cell-md-9 cell-xl-8 order-2 pr-1-sx pl-1-sx pr-5-md pl-5-md remark success">
                

                <h1 class="display2"><small>Ҳодим:<?=  Html::a( $this->title   , ['/site/logout'], ['data-method' => 'post']) ?>  </small>  <hr></h1>
                <h3 class=""><small>Барча аризалар:<span class="badge inline bg-green fg-white"> <?= Html::encode($deftaul_stats) ?> </small>  <hr></h3>
                <h3 class=""><small>Кўриб чиқилган: <span class="badge inline bg-blue fg-white"><?= Html::encode($inf_stats) ?> </small>  <hr></h3>
                <h3 class=""><small>Кўриб чиқилмаган: <span class="badge inline bg-red fg-white"><?= Html::encode($deftaul_stats-$inf_stats) ?> </small>  <hr></h3>
                <h4><?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'name',
                            // 'contact',
                            'username',
                            'password',
                            //'viloyat',
                            'tuman',
                            
                        ],
                    ]) ?>        
                </h4>
                
            </main>
        </div>

    </div>


