<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use frontend\models\Company;
use frontend\models\Media;
use frontend\models\Viloyatlar;
use frontend\models\Filiallar;
use frontend\models\Credit;
use frontend\models\User;
use yii\web\UploadedFile;

class CompanyController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $this->layout = 'main2';
        $comm_inn = ''; 
        $user_email = '';
        $user_id = '';
        $com_vil = '';
        $com_tum = '';

        $vil = '';

        $company = new Company();
        $credit = new Credit();
        $user=new User();
        $media=new Media();

        if (Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $vil = $data['Credit']['viloyat'];

            $com_tel_r = $data['Company']['com_tel']; 
            $com_address = $data['Company']['com_address'];
            $com_okeyt = $data['Company']['okeyt'];
           



          
          //  $com_tel = $date[][];
        }

        if($company->load(Yii::$app->request->post())&&$credit->load(Yii::$app->request->post())&&$user->load(Yii::$app->request->post())&&$media->load(Yii::$app->request->post())){
             $comm_inn = $company->inn;
               $com_vil = $company->viloyat;
               $com_tum = $company->tuman;


               $user_email= $user->email;
               $user_id = $user->id;
               $user->comp_inn = $comm_inn;
               $user->username = $user_email;
               $user->password = $comm_inn;


               $credit->company_id = $comm_inn;
               $credit->user_id = '1';
              // $credit->supply = 'learn and submit here again';
               $credit->viloyat = $vil;
               //adding part
               $company->com_tel = $com_tel_r;
               $company->com_address = $com_address;
               $company->okeyt = $com_okeyt;
               //get the instance of the uploaded file
               /*$imageName = $company->name;
               $company->file=UploadedFile::getInstance($company, 'file');
               $company->file->saveAs('uploads/'.$imageName.'.'.$company->file->extension);

               //save file to DB
               $company->docs='uploads/'.$imageName.'.'.$company->file->extension;*/

               $media->id=$comm_inn;


               $name=UploadedFile::getInstance($media, 'filename');
               $path='uploads/'.$name->baseName.'.'.$name->extension;
               if($name->saveAs(Yii::getAlias('@filePath').'/'.$path)){
                   $media->filename=$name->baseName.'.'.$name->extension;
                   $media->filepath=$path;
               }

               $name2=UploadedFile::getInstance($media, 'filename2');
               $path2='uploads/'.$name2->baseName.'.'.$name2->extension;
               if($name2->saveAs(Yii::getAlias('@filePath').'/'.$path2)){
                   $media->filename2=$name2->baseName.'.'.$name2->extension;
                   $media->filepath2=$path2;
               }

               

               $name3=UploadedFile::getInstance($media, 'filename3');
               $path3='uploads/'.$name3->baseName.'.'.$name3->extension;
               if($name3->saveAs(Yii::getAlias('@filePath').'/'.$path3)){
                   $media->filename3=$name3->baseName.'.'.$name3->extension;
                   $media->filepath3=$path3;
               }

               $name4=UploadedFile::getInstance($media, 'filename4');
               $path4='uploads/'.$name4->baseName.'.'.$name4->extension;
               if($name4->saveAs(Yii::getAlias('@filePath').'/'.$path4)){
                   $media->filename4=$name4->baseName.'.'.$name4->extension;
                   $media->filepath4=$path4;
               }

               $name5=UploadedFile::getInstance($media, 'filename5');
               $path5='uploads/'.$name5->baseName.'.'.$name5->extension;
               if($name5->saveAs(Yii::getAlias('@filePath').'/'.$path5)){
                   $media->filename5=$name5->baseName.'.'.$name5->extension;
                   $media->filepath5=$path5;
               }

               


               



               





            if ($company->validate() && $user->validate() && $credit->validate() && $media->validate()) {
              
                $company->save();

                $media->save();

               
               $user->save();

           
                $credit->save();




                // yii::$app->getSession()->setFlash('more-info-box bg-green fg-white',' &nbsp;&nbsp; Сизнинг аризангиз қабул килинди!  Кабинетга кириш учун сиз &nbsp; <strong> &nbsp; Э-почта &nbsp; </strong>&nbsp;  ва &nbsp; <strong> &nbsp; ИНН(STIR) </strong>дан фойдаланинг');
                 return $this->redirect('../site/login');
            }

            
        }

        return $this->render('create',[
            'company'=>$company,
            'credit'=>$credit,
            'user'=>$user,
            'media'=>$media,
        ]);

        

       



    }

    public function actionDelete()
    {
        // return $this->render('delete');

   
          return  $this->redirect(['/site/about']);  
        
    }

        public function actionListss($id)
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



    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {

        return $this->render('index');
    }

}
