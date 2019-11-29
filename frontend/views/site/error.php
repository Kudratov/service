<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="site-error">

    

    <div class="alert alert-danger">
        
    </div>

    <div class="mx-auto ml-auto mx-auto mt-15 pt-15" style="width: 50%">
        <div class="text-center">
            <div class="card image-header">
   
    <div class="card-content p-2">
       <h1><?= Html::encode($this->title) ?></h1>
        
        <p class="fg-gray"> Афсуски сахифа торилмади!</p>
    </div>
    <div class="card-footer">
            <a  href="<?= Url::to(['site/login']) ?>" class="button success mx-auto ml-auto mx-auto">
                <span class="mif-arrow-left ani-hover-horizontal"> Асосий саҳифа</span>
            </a>
         
    </div>
</div>
        </div> 
    </div>

</div>
