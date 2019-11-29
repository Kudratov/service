<?php
namespace backend\controllers;

use Yii;
use backend\models\Stuff;
use backend\models\StuffSearch;
use backend\models\Filiallar;
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
                'only' => ['create', 'index', 'update', 'view'],
                'rules' => [

                    [
                        'allow' => true,
                        'actions' => ['create', 'index', 'update', 'view'],
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
    public function actionIndex()
    {
         $this->layout='main2';
         $stuff_vil='';
         $stuff_tum= '';
         $cur_stuff =  Yii::$app->user->getId();
         
         $inf_stuff = Stuff::find()->where(['id'=>$cur_stuff])->all();
         foreach ($inf_stuff as $inf_stuffs) {
            $stuff_vil = $inf_stuffs->viloyat;
            $stuff_tum = $inf_stuffs->tuman;
            
         }



         
        $searchModel = new StuffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cur_stuff'=>$cur_stuff, 
            'stuff_vil' =>$stuff_vil,
            'stuff_tum' => $stuff_tum,
        ]);
    }



    /**
     * Displays a single Stuff model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Stuff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $stuff = new Stuff();

        if ($stuff->load(Yii::$app->request->post()) && $stuff->save()) {
            return $this->redirect(['view', 'id' => $stuff->id]);
        }

        return $this->render('create', [
            'stuff' => $stuff,
        ]);
    }


//  to choose fillial
        public function actionLists($id)
    {
        $countFillials=Filiallar::find()
            ->where(['fil_id'=>$id])
            ->count();
        $fillials=Filiallar::find()
            ->where(['fil_id'=>$id])
            ->all();

            if($countFillials>0)
            {
                foreach($fillials as $fillall)
                {
                    echo "<option value='".$fillall->filial."'>".$fillall->filial."</option>";
                }
            }
            else{
                echo"<option> - </option>";
            }

    }
    /**
     * Updates an existing Stuff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {  

         $stuff= new Stuff();
        $stuff = $this->findModel($id);

        if ($stuff->load(Yii::$app->request->post()) && $stuff->save()) {
            return $this->redirect(['view', 'id' => $stuff->id]);
        }

        return $this->render('update', [
            'stuff' => $stuff,
        ]);
    }

    /**
     * Deletes an existing Stuff model.
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
     * Finds the Stuff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stuff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stuff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
