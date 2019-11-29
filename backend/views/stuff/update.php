<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Stuff */

// $this->title = 'Update Stuff: ' . $model->name;
// $this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Update';
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
                

                <h1 class="display2"><small>Ҳодим: <?= Html::encode($this->title) ?> </small>  <hr></h1>
               
					    <?= $this->render('_form', [
					        'stuff' => $stuff,
					    ]) ?>        
              
                
            </main>
        </div>

    </div>

