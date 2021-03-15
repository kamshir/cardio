<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_service".
 *
 * @property int $id_sub_service
 * @property string $title
 * @property string $price
 * @property int $id_service
 *
 * @property Service $service
 */
class SubService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'id_service'], 'required'],
            [['id_service'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['price'], 'string', 'max' => 50],
            [['id_service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id_service' => 'id_service']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sub_service' => 'Id Sub Service',
            'title' => 'Title',
            'price' => 'Price',
            'id_service' => 'Id Service',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id_service' => 'id_service']);
    }
}
