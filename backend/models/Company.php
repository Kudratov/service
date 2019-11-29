<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $establish_date
 * @property string $viloyat
 * @property string $tuman
 * @property string $inn
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['name', 'establish_date', 'viloyat', 'tuman', 'inn'], 'required'],
            [['name', 'establish_date', 'viloyat', 'tuman', 'inn'], 'string', 'max' => 255],
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
            'establish_date' => 'Establish Date',
            'viloyat' => 'Viloyat',
            'tuman' => 'Tuman',
            'inn' => 'Inn',
        ];
    }
}
