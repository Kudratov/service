<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property int $stuff_id
 * @property int $comp_inn
 * @property int $credit_id
 * @property int $status
 * @property string $comment
 * @property int $open_status
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stuff_id', 'comp_inn', 'credit_id', 'status', 'comment', 'open_status'], 'required'],
            [['stuff_id', 'comp_inn', 'credit_id', 'status', 'open_status'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stuff_id' => 'Stuff ID',
            'comp_inn' => 'Comp Inn',
            'credit_id' => 'Credit ID',
            'status' => 'Холати',
            'comment' => 'Хулоса',
            'open_status' => 'Open Status',
        ];
    }
}
