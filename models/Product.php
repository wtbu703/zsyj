<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $id
 * @property string $productTitle
 * @property string $productDiscri
 * @property double $productPrice
 * @property double $productDiscount
 * @property string $productUnit
 * @property string $picUrl
 * @property string $thumbnailUrl
 * @property double $inventory
 * @property string $productState
 * @property string $prodcutType
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['productPrice', 'productDiscount', 'inventory'], 'number'],
            [['id', 'productUnit', 'productState', 'productType', 'isIndex','productSize'], 'string', 'max' => 32],
            [['productTitle'], 'string', 'max' => 64],
            [['productDiscri'], 'string', 'max' => 512],
            [['picUrl', 'thumbnailUrl'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '产品id'),
            'productTitle' => Yii::t('app', '产品名称'),
            'productDiscri' => Yii::t('app', '产品描述'),
            'productPrice' => Yii::t('app', '产品价格'),
            'productDiscount' => Yii::t('app', '产品折扣'),
            'productUnit' => Yii::t('app', '产品单位，从数据字典中读取'),
            'picUrl' => Yii::t('app', '产品图片组图'),
            'thumbnailUrl' => Yii::t('app', '产品缩略图'),
            'inventory' => Yii::t('app', '产品库存'),
            'productState' => Yii::t('app', '产品状态，从数据字典中读取'),
            'productType' => Yii::t('app', '产品类别，从数据字典中读取'),
            'isIndex' => Yii::t('app', '产品图片是否显示首页，从数据字典中读取'),
            'productSize' => Yii::t('app', '产品规格'),
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\activeQuery\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activeQuery\ProductQuery(get_called_class());
    }
}
