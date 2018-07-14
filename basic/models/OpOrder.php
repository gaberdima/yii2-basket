<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "op_order".
 *
 * @property integer $id
 * @property string $price
 * @property string $name
 * @property integer $article
 * @property integer $count
 * @property string $email
 * @property integer $basket_number
 */
class OpOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'op_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'name', 'article', 'count', 'email', 'basket_number'], 'required'],
            [['article', 'count', 'basket_number'], 'integer'],
            [['price', 'name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'name' => 'Name',
            'article' => 'Article',
            'count' => 'Count',
            'email' => 'Email',
            'basket_number' => 'Basket Number',
        ];
    }
}
