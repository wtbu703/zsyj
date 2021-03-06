<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%receive}}".
 *
 * @property string $id
 * @property string $informId
 * @property string $receiverId
 * @property string $receiveState
 * @property string $receiveDateTime
 */
class Receive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%receive}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '消息接收表id',
            'informId' => '通知id',
            'receiverId' => '接收人id',
            'receiveState' => '接收人查看状态，从数据字典中读取',
            'receiveDateTime' => '查看时间',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\activeQuery\ReceiveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\activeQuery\ReceiveQuery(get_called_class());
    }
}
