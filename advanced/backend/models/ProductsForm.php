<?php

namespace backend\models;

use yii\web\UploadedFile;

class ProductsForm extends \yii\base\Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $imgUrl;
    public $idCategori;
    public $count;
    public $id_discount;
    public $imageFile;

    public static function tableName()
    {
        return 'products';
    }

        public function rules()
    {
        return [
            [['name', 'price', 'idCategori', 'description', 'count', 'imgUrl'], 'required', 'message' => 'Error'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if (($this->imageFile!=null) && $this->validate("name, price, description, idCategori")) {
            $FileName=md5(microtime());
            $this->imgUrl='../../uploads/' . $FileName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->imgUrl);
            return true;
        } else {
            return false;
        }
    }
}
