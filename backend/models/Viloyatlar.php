<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "viloyatlar".
 *
 * @property string $vil_id
 * @property string $viloyat
 */
class Viloyatlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'viloyatlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vil_id', 'viloyat'], 'required'],
            [['vil_id'], 'string', 'max' => 255],
            [['viloyat'], 'string', 'max' => 50],
            [['vil_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vil_id' => 'Vil ID',
            'viloyat' => 'Viloyat',
        ];
    }
}
