<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%userinfo}}".
 *
 * @property string $id
 * @property string $userId
 * @property string $recipientName
 * @property string $mobilephone
 * @property string $areaAddress
 * @property string $detailAddress
 * @property string $postcode
 * @property integer $userInfoClicks
 * @property string $userInfoState
 * @property string $truename
 * @property integer $hcity
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%userinfo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['userInfoClicks', 'hcity'], 'integer'],
            [['id', 'userId', 'areaAddress', 'userInfoState', 'truename'], 'string', 'max' => 32],
            [['recipientName'], 'string', 'max' => 64],
            [['mobilephone'], 'string', 'max' => 16],
            [['detailAddress'], 'string', 'max' => 512],
            [['postcode'], 'string', 'max' => 6]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户基本信息表Id',
            'userId' => '外键，关联用户表id',
            'recipientName' => '收件人姓名',
            'mobilephone' => '收件人手机号码',
            'areaAddress' => '收件区域地址',
            'detailAddress' => '详细地址',
            'postcode' => '邮政编码',
            'userInfoClicks' => '用户使用地址次数，按照这个次数降序排列',
            'userInfoState' => '用户地址信息状态',
            'truename' => '收货人',
            'hcity' => '省对应的编号',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\activeQuery\UserinfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activeQuery\UserinfoQuery(get_called_class());
    }
}
