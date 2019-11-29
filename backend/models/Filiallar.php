<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "filiallar".
 *
 * @property int $fil_id
 * @property string $filial
 */
class Filiallar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filiallar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fil_id', 'filial'], 'required'],
            [['fil_id'], 'integer'],
            [['filial'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fil_id' => 'Fil ID',
            'filial' => 'Filial',
        ];
    }
}
