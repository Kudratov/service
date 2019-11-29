<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Stuff */

$this->title = 'Create Stuff';
$this->params['breadcrumbs'][] = ['label' => 'Stuffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
