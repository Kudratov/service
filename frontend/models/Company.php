<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string $establish_date
 * @property string $viloyat
 * @property string $tuman
 * @property string $inn
 * @property string $docs
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'establish_date', 'viloyat', 'tuman', 'inn' ,'com_address','okeyt','com_tel'], 'required', 'message'=>'{attribute} киритинг' ],
            [['file'], 'file'],
            [[ 'inn'], 'string','length'=>9,'message'=>'киритинг'],
             [[ 'okeyt'], 'string','length'=>5],
            [['name', 'establish_date', 'viloyat', 'tuman','docs'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Кредит олувчи корхона номи',
            'establish_date' => 'Ташкил этилган сана:',
            'viloyat' => 'Вилоят',
            'tuman' => 'Туман',
            'inn' => ' СТИР (ИНН)',
            'com_address' =>'Батафсил',
            'okeyt' => 'ИФУТ коди (Амалга оширилаётган фаолият тури )',
            'file'=>'Ҳужжат юклаш ',
            'com_tel' => 'Компания телефон рақами',
        ];
    }
}
