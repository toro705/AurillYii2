<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "slidermain".
 *
 * @property integer $id
 * @property string $img
 * @property integer $position
 */
class Slidermain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    
    public static function tableName()
    {
        return 'slidermain';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['position'], 'required'],
            [['position'], 'integer'],
            [['file'], 'file'],            
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
            'position' => 'Position',
            'file' => 'Imagen',

        ];
    }
}
