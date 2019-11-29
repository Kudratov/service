<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StuffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stuffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stuff-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stuff', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'contact',
            'username',
            'password',
            //'viloyat',
            //'tuman',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
