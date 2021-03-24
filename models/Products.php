<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $type_id
 * @property integer $line_id
 * @property string $name
 * @property string $description
 * @property string $size
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;
    public $uses;

    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'line_id'], 'integer'],
            [['description'], 'string'],
            [['file'], 'file'],
            [['uses'], 'default'],
            [['name', 'size', 'img'], 'string', 'max' => 255],
            [['type_id', 'line_id', 'description', 'name', 'size'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'line_id' => 'Line ID',
            'name' => 'Name',
            'description' => 'Descripción',
            'size' => 'Tamaño',
            'img' => 'Imagen',
            'use_id' => 'Usos',
            'file' => 'Imagen',
        ];
    }
    public function getTypes()
    {
        return $this->hasOne(Types::ClassName(), ['id' => 'type_id']);
    }    
    public function getLines ()
    {
        return $this->hasOne(Lines::ClassName(), ['id' => 'line_id']);
    }    
 
   //public function getUses ()
   //{
   //    return $this->hasOne(Uses::ClassName(), ['id' => 'id']);
   //}    
   public function getProductUses ()
   {
       return $this->hasMany(ProductUses::ClassName(), ['product_id' => 'id']);
   }    
    public function getUses() {
        return $this->hasMany(Uses::className(), ['id' => 'use_id'])
          ->viaTable('product_uses', ['product_id' => 'id']);
    }    
}

