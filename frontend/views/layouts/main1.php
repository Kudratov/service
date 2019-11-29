<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

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
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <style >
        
        body {
            background-image: url(<?= Yii::$app->request->baseUrl ?>/images/back.PNG);
            background-repeat: no-repeat;
            background-size:cover;
            }
    </style>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="m4-cloak"  >
    <?php $this->beginBody() ?>



                                    <?= Breadcrumbs::widget([
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]) ?>
                                    <?= Alert::widget() ?>
                                    <?= $content ?>
                               
        


        <!-- begin::Global Config(global config for global JS sciprts) -->
        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
