<?php

namespace backend\models;

use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class NewproductsForm extends \yii\base\Model
{
    public $id;
    public $name;
    public $description;
    public $urlImage;
    public $imageFile;

    public static function tableName()
    {
        return 'Newproducts';
    }

        public function rules()
    {
        return [
            [['name', 'description', 'urlImage'], 'required', 'message' => 'Error'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if (($this->imageFile!=null) && $this->validate("name, description")) {
            $FileName=md5(microtime());
           $this->urlImage='../../uploads/' . $FileName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($this->urlImage);
            return true;
        } else {
            return false;
        }
    }
}
