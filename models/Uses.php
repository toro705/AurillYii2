<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uses".
 *
 * @property integer $id
 * @property string $name
 */
class Uses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
//   public function getProducts ()
//   {
//       return $this->hasMany(Products::ClassName(), ['id' => 'id'])
//
//
//   }    

    public function getProductUses() {
        return $this->hasMany(ProductUses::className(), ['use_id' => 'id']);
    }    

}
