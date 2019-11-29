<?php

namespace backend\models;

use Yii;

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
class User extends \yii\db\ActiveRecord
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
            [['name', 'phone', 'email', 'address', 'comp_inn', 'username', 'password'], 'required'],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'comp_inn' => 'Comp Inn',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
}
