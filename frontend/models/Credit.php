<?php

namespace frontend\models;

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
 * @property int $cr_protsent
 * @property string $cr_maqsadi
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
            [['user_id', 'company_id', 'c_type', 'viloyat', 'fillial', 'type', 'summa', 'expire_date', 'supply', 'cr_protsent', 'cr_maqsadi'], 'required', 'message'=>'{attribute} киритинг'],
            [['user_id', 'company_id', 'expire_date', 'cr_protsent'], 'integer'],
            [['c_type', 'viloyat', 'fillial', 'type', 'summa', 'supply', 'cr_maqsadi'], 'string', 'max' => 255],
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
            'company_id' => 'Company ID',
            'c_type' => 'Кредит тури',
            'viloyat' => 'Вилоят',
            'fillial' => 'Филиал',
            'type' => 'Валюта тури',
            'summa' => 'Сумма',
            'expire_date' => 'Кредит муддати (ой)',
            'supply' => 'Таъминоти',
            'cr_protsent' => 'Кредит фоизи ',
            'cr_maqsadi' => 'Кредит мақсади',
        ];
    }
}
