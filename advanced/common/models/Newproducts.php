<?php

namespace common\models;

use Yii;


class Newproducts extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'newproducts';
    }

    
    public function rules()
    {
        return [
            [['name', 'urlImage'], 'required'],
            [['description'], 'string'],
            [['name', 'urlImage'], 'string', 'max' => 255],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'urlImage' => 'Url Image',
        ];
    }
}
