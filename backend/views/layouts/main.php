<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\web\Application;
use common\widgets\Alert;
use backend\models\Stuff;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  <link rel="shortcut icon" href="/images/logo/logo_ab.png" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149306370-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-149306370-1');
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
</head>
<body class="m4-cloak" data-role="htmlcontainer" data-html-source="header.html" data-insert-mode="prepend">
    <?php 
        $stuff = New Stuff();
        $user_name = Yii::$app->user->identity->username;
       // $stuff_name = $stuff->find()->where([''])
    ?>

<?php $this->beginBody() ?>
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
                                <li><a href="#"><i class="mif-import-contacts"></i> &nbsp;Натижалар</a></li>
                                <li><a href="#"><i class="mif-cogs"></i> &nbsp;Созлаш</a></li>
                                <li class="divider bg-lightGray"></li>
                                <li> <?=  Html::a('<i class="mif-exit"></i> Чиқиш', ['/site/logout'], ['data-method' => 'post']) ?></li>


                            </ul>
                        </li>
                                       
                    </ul>
              
                    

                
                        
                       
                  
        </header>
    </div>


                                           
                                       
               


    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
  
                           

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
