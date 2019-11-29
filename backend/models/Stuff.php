<?php

namespace backend\models;

use Yii;
use yii\web\IdentityInterface;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\base\Security;

/**
 * This is the model class for table "stuff".
 *
 * @property int $id
 * @property string $name
 * @property string $contact
 * @property string $username
 * @property string $password
 * @property string $viloyat
 * @property string $tuman
 */
class Stuff extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stuff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name',  'username', 'password', 'viloyat', 'tuman'], 'required','message'=>'{attribute}ни киритинг' ],
            [['name', 'contact', 'username', 'password', 'viloyat', 'tuman'], 'string', 'max' => 255],

            ['password_repeat', 'required'],
            ['password', 'string', 'min' => 4],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Парол мос келмади" ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ф.И.О',
            'contact' => 'Телефон рақам',
            'username' => 'Логин',
            'password' => 'Парол',
            'viloyat' => 'Вилоят',
            'tuman' => 'Туман',
        ];
    }
        public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          throw new \yii\base\NotSupportedException();
        //return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
         throw new \yii\base\NotSupportedException();
       // return $this->auth_key;
    }
    public function getViloyatlar(){
        return $this->hasOne(Viloyatlar::className(), ['vil_id'=>'viloyat']);
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException();
        
                  //  return $this->getAuthKey() === $authKey;
    }


    // public function beforeSave($insert){
    //     if(parent::beforeSave($insert)){
    //         if($this->isNewRecord){
    //             $this->auth_key = \yii::$app->security->generateRandomString();
    //         }
    //         if(isset($this->password)){
    //             $this->password = md5($this->password);
    //             return parent::beforeSave($insert);
    //         }
    //     }
    //     return true;
    // }

    public function validatePassword($password){
        return $this->password === $password;
    }

    public static function findByUsername($username){
        return Stuff::findOne(['username' => $username]);
    }
}
