<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Company;
use app\models\Viloyatlar;
use app\models\Filiallar;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form ActiveForm */
?>
<div class="site-index">
<h2 class="page-head">Kredit form</h2>

<?php

$msg=yii::$app->getSession()->getFlash('success');
if(null!==$msg): 
?>
<div class="alert alert-success"> <?= $msg ?> </div>
<?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($company, 'name') ?>
        
        <?= $form->field($company, 'establish_date') ?> 

        <?= $form->field($company, 'viloyat')->dropDownList(
                        Viloyatlar::find()
                        ->select(['viloyat','vil_id'])
                        ->indexBy('vil_id')
                        ->column(),['prompt'=>'Select Viloyat']
    ) ?>


        <?= $form->field($company, 'tuman')->dropDownList(
                        Filiallar::find()
                        ->select(['filial','fil_id'])
                        ->where([
                            
                        ])
                        ->indexBy('filial')
                        ->column(),['prompt'=>'Select tuman']
    ) ?>



        <?= $form->field($company, 'inn') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-index -->
