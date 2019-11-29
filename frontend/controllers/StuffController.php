<?php
namespace frontend\controllers;

use Yii;
use frontend\models\Stuff;
use frontend\models\StuffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * StuffController implements the CRUD actions for Stuff model.
 */
class StuffController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','index', 'update', 'view'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => [ 'create', 'index', 'update', 'view'],
                        'roles' => ['@'],
                    ],
                ],
              /*  'denyCallback' => function ($rule, $action) {
                    throw new \Exception('You are not allowed to access this page');
                }*/
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Stuff models.
     * @return mixed
     */
  

    /**
     * Displays a single Stuff model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    /**
     * Creates a new Stuff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   

    /**
     * Updates an existing Stuff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  

    /**
     * Deletes an existing Stuff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   

    /**
     * Finds the Stuff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stuff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
   
}
