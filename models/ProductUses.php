<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_uses".
 *
 * @property integer $id
 * @property integer $use_id
 * @property integer $product_id
 */
class ProductUses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_uses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['use_id', 'product_id'], 'required'],
            [['use_id', 'product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'use_id' => 'Use ID',
            'product_id' => 'Product ID',
        ];
    }
    public function getUses ()
    {
        return $this->hasOne(Uses::ClassName(), ['id' => 'use_id']);
    }    
    public function getProducts ()
    {
        return $this->hasOne(Products::ClassName(), ['id' => 'product_id']);
    }    

}
