<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use frontend\models\Credit;
use frontend\models\Company;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {   

        if (!Yii::$app->user->isGuest) {

             //take current user
        $company_inn = '';
        $hold_current_user = Yii::$app->user->getId();
        $searchModel = new UserSearch();
        $cur_user = User::find();

        $show_user = $cur_user->where(['id' => $hold_current_user])->all();

        foreach ($show_user as $for_values) {
            $company_inn = $for_values->comp_inn;
        }
        $cur_user_comp = Company::find()->where(['inn'=>$company_inn])->all();
        $cur_user_cridet = Credit::find()->where(['company_id'=>$company_inn])->all();
       // $cur_cridit_status = Status::find() used for status 



        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider'=> $dataProvider,
            'show_user'    => $show_user,
            'company_inn' => $company_inn,
            'cur_user_comp' => $cur_user_comp,
            'cur_user_cridet'=> $cur_user_cridet,
        ]);
           
        }else{
          return  $this->redirect(['/site/about']);  
        }
       
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $age = 29 ;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'age'  => $age,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $name = 'Shoh';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'name' =>$name,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
