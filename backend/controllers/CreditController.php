<?php

namespace backend\controllers;

use Yii;
use backend\models\Credit;
use backend\models\Stuff;
use backend\models\CreditSearch;
use backend\models\Status;
use backend\models\Media;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CreditController implements the CRUD actions for Credit model.
 */
class CreditController extends Controller
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
     * Lists all Credit models.
     * @return mixed
     */
    public function actionIndex()
    {   
         $this->layout = 'main2';
        $stuff_vil='';
        $stuff_tum= '';
         $cur_stuff =  Yii::$app->user->getId();
        // take current users viloyat and tuman 
         $inf_stuff = Stuff::find()->where(['id'=>$cur_stuff])->all();
         foreach ($inf_stuff as $inf_stuffs) {
            $stuff_vil = $inf_stuffs->viloyat;
            $stuff_tum = $inf_stuffs->tuman;
         }


        $searchModel = new CreditSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);





        //$dataProvider = $searchModel->where([])

       if($cur_stuff == 1){
            return $this->redirect(['stuff/index']);
        }else  {
            
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cur_stuff'  => $cur_stuff,
            'stuff_vil' =>$stuff_vil,
            'stuff_tum' => $stuff_tum,
        ]);
        }
    }

    /**
     * Displays a single Credit model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
         
    // save to Status base with Credit Controller
 $cur_stuff =  Yii::$app->user->getId();
        $saveStatus = new Status();
   
        if($saveStatus->load(Yii::$app->request->post()))
        {
            if ($saveStatus->validate()) {
                $saveStatus->save();
                return $this->redirect('/admin/credit/index');
            }else {
                return   $this->refresh();
            }
        }        

        return $this->render('view', [
            'model' => $this->findModel($id),
            'cur_stuff'=>$cur_stuff,
            'saveStatus'=>$saveStatus,
        ]);
    }
 /**
     * Creates a new Credit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionDownload($id)
    {

        $data=Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath,PATHINFO_EXTENSION));
        header('Content-Disposition:attachment;filename='.$data->filename);
        return readfile($data->filepath);



        /*
        $files= '';
        $for_stuf_info_com = Company::find()->where(['inn'=>'company_id'])->all();
        $for_stuf_info_user = User::find()->where(['comp_inn'=>'company_id'])->all();
        foreach ($for_stuf_info_com as $company):
            
            $files=$company->docs;
            
        endforeach;


        $path=Yii::getAlias('@webroot').'/files';
        
        $file=$path.'/pic.jpg';

        if(file_exists($file)){
            Yii::$app->response->xSendFile($file);
        }
        else{
            $this->render('view.php');
        }
        */
    }

    public function actionDownloadx($id)
    {

        $data=Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath2,PATHINFO_EXTENSION));
        header('Content-Disposition:attachment;filename='.$data->filename2);
        return readfile($data->filepath2);
    }

    public function actionDownloady($id)
    {

        $data=Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath3,PATHINFO_EXTENSION));
        header('Content-Disposition:attachment;filename='.$data->filename3);
        return readfile($data->filepath2);
    }

    public function actionDownloada($id)
    {

        $data=Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath4,PATHINFO_EXTENSION));
        header('Content-Disposition:attachment;filename='.$data->filename4);
        return readfile($data->filepath2);
    }

    public function actionDownloadb($id)
    {

        $data=Media::findOne($id);
        header('Content-Type:'.pathinfo($data->filepath4,PATHINFO_EXTENSION));
        header('Content-Disposition:attachment;filename='.$data->filename4);
        return readfile($data->filepath2);
    }





    /**
     * Creates a new Credit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Credit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Credit model.
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
     * Deletes an existing Credit model.
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
     * Finds the Credit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Credit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Credit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
//     public function actionGo(){
//      $user = new User;
// find new table 
//     }
    }