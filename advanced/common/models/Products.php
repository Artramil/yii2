<?php

namespace common\models;
use common\models\Category;
use common\models\Discaunt;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property string $imgUrl
 * @property int $idCategori
 * @property int $count
 * @property int $id_discount
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'imgUrl', 'idCategori', 'count'], 'required'],
            [['description'], 'string'],
            [['price', 'idCategori', 'count', 'id_discount'], 'integer'],
            [['name', 'imgUrl'], 'string', 'max' => 255],
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
            'descriptioin' => 'Description',
            'price' => 'Price',
            'imgUrl' => 'Img Url',
            'idCategori' => 'Id Categori',
            'count' => 'Count',
            'id_discount' => 'Id Discount',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'idCategori']);
    }

    public function getDiscaunt()
    {
        return $this->hasOne(Discaunt::className(),['id'=>'id_discount']);
    }
}
