<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "discaunt".
 *
 * @property int $id
 * @property string $name
 * @property int $discount
 */
class Discaunt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discaunt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'discount'], 'required'],
            [['discount'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'discount' => 'Discount',
        ];
    }
}
