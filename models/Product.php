<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $time
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $contry
 * @property int $categoryid
 * @property string $color
 * @property int $count
 *
 * @property Cart[] $carts
 * @property Category $category
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['name', 'image', 'price', 'contry', 'categoryid', 'color', 'count'], 'required'],
            [['categoryid', 'count'], 'integer'],
            [['image'], 'file', 'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['name', 'image', 'price', 'contry', 'color'], 'string', 'max' => 255],
            [['categoryid'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'name' => 'Name',
            'image' => 'Image',
            'price' => 'Price',
            'contry' => 'Contry',
            'categoryid' => 'Categoryid',
            'color' => 'Color',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::class(), ['productid' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class(), ['id' => 'categoryid']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class(), ['productid' => 'id']);
    }
}
