<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property int $id
 * @property string $filename
 * @property string $filepath
 * @property string $filename2
 * @property string $filepath2
 * @property string $filename3
 * @property string $filepath3
 * @property string $filename4
 * @property string $filepath4
 * @property string $filename5
 * @property string $filepath5
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename', 'filepath', 'filename2', 'filepath2', 'filename3', 'filepath3', 'filename4', 'filepath4', 'filename5', 'filepath5'], 'required'],
            [['filename', 'filepath', 'filename2', 'filepath2', 'filename3', 'filepath3', 'filename4', 'filepath4', 'filename5', 'filepath5'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
            'filepath' => 'Filepath',
            'filename2' => 'Filename2',
            'filepath2' => 'Filepath2',
            'filename3' => 'Filename3',
            'filepath3' => 'Filepath3',
            'filename4' => 'Filename4',
            'filepath4' => 'Filepath4',
            'filename5' => 'Filename5',
            'filepath5' => 'Filepath5',
        ];
    }
}
