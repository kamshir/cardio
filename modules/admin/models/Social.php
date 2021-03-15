<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id_social
 * @property int $id
 * @property string|null $vk
 * @property string|null $telegram
 * @property string|null $instagram
 * @property string|null $twitter
 *
 * @property Doctor $id0
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['vk', 'telegram', 'instagram', 'twitter'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_social' => 'ID',
            'id' => 'ID Врача',
            'vk' => 'Вконтакте',
            'telegram' => 'Telegram',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id']);
    }
}
