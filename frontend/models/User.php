<?php

namespace frontend\models;
use Yii;
use yii\web\IdentityInterface;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\base\Security;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int $comp_inn
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email',  'comp_inn', 'username', 'password'], 'required', 'message'=>'{attribute} киритинг'],
            [['comp_inn'], 'integer'],
            [['name', 'email', 'address', 'username', 'password'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ф.И.Ш',
            'phone' => 'Телефон рақам',
            'email' => 'Э-почта',
            'address' => 'Манзил',
            'comp_inn' => 'Comp Inn',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }


       /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
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
        return User::findOne(['username' => $username]);
    }
}
