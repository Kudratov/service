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

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_ab.png" type="image/x-icon">
        <link rel="icon" href="<?= Yii::$app->request->baseUrl ?>/images/logo/logo_ab.png" type="image/x-icon">

        <link href="metro/css/metro-all.css?ver=@@b-version" rel="stylesheet">
        <link href="highlight/styles/github.css" rel="stylesheet">
        <link href="docsearch/docsearch.min.css" rel="stylesheet">
        <link href="css/site.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149306370-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-149306370-1');
    </script>
        <style >
           
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
<body class="m4-cloak" data-role="htmlcontainer"   data-html-source="header.html" data-insert-mode="prepend">

                             
                                   
                                    <?= Alert::widget() ?>
                                    <?= $content ?>
                            


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
