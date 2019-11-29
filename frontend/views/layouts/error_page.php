<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
$assets =  frontend\assets\AppAsset::register($this);
$baseUrl = $assets->baseUrl;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_ab.png" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149306370-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-149306370-1');
    </script>

       <style> 
         #boxx{
                border-radius: 15px;
                background-color: #fff;
                    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);

            }
       </style>
 
    

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
   <body class="m4-cloak" data-role="htmlcontainer" data-html-source="header.html" data-insert-mode="prepend">
    <div class="container-fluid">
            <div class="container-fluid bg-emerald fg-white pos-fixed fixed-top z-top">
        <header class="app-bar container bg-emerald fg-white pos-relative app-bar-expand" data-role="appbar" data-expand-point="md" id="app-bar-156655019999672" data-role-appbar="true">
            <button type="button" class="hamburger menu-down hidden">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </button>
            <div class="text-center ml-auto mx-auto ms-auto">
                    <ul class="inline-list reduce-1" id="footer-menu">
                        <li><i class="mif-phone"></i><span class="text-nowrap"> (0 371) 203 88 88 </li>
                        <li><i class="mif-my-location"></i> 100096, Toshkent shahri, Muqimiy ko'chasi 43-uy</li>
                        <li><i class="mif-envelop"></i> headoffice@agrobank.uz </li>
                       
                                       
                    </ul>
                </div>
                 
                   
              
                    

                
                        
                       
                  
        </header>
    </div>

                             
                                   
                                    <?= Alert::widget() ?>
                                    <?= $content ?>
                            


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
