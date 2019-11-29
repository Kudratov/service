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
   <style>
        
        body {
            background-image: url(<?= Yii::$app->request->baseUrl ?>/images/back.PNG);
            background-repeat: no-repeat;
            background-size:cover;
            }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149306370-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-149306370-1');
    </script>
</head>
<body class="m4-cloak">

<?php $this->beginBody() ?>



       
    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
  
                        
           

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
