<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "credit".
 *
 * @property int $id
 * @property int $user_id
 * @property int $company_id
 * @property string $c_type
 * @property string $viloyat
 * @property string $fillial
 * @property string $type
 * @property string $summa
 * @property int $expire_date
 * @property string $supply
 */
class Credit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'company_id', 'c_type', 'viloyat', 'fillial', 'type', 'summa', 'expire_date', 'supply'], 'required'],
            [['user_id', 'company_id', 'expire_date'], 'integer'],
            [['c_type', 'viloyat', 'fillial', 'type', 'summa', 'supply'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_id' => 'Корхона ИНН(STIR)',
            'c_type' => 'Кредит тури',
            'viloyat' => 'Вилоят',
            'fillial' => 'Филиал',
            'type' => 'Type',
            'summa' => 'Сумма',
            'expire_date' => 'Expire Date',
            'supply' => 'Supply',
            'filename'=>'ИНН(STIR)',
        ];
    }
}
