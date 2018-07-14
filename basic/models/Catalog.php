<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $name
 * @property integer $article
 * @property string $price
 * @property string $img
 * @property string $description
 * @property integer $categories
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'article', 'price', 'img', 'description', 'categories'], 'required'],
            [['article', 'categories'], 'integer'],
            [['description'], 'string'],
            [['name', 'price', 'img'], 'string', 'max' => 255],
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
            'article' => 'Article',
            'price' => 'Price',
            'img' => 'Img',
            'description' => 'Description',
            'categories' => 'Categories',
        ];
    }
}
