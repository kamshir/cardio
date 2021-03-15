<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speciality".
 *
 * @property int $id_speciality
 * @property string $title
 * @property int $id_service
 *
 * @property Doctor[] $doctors
 * @property Service $service
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'id_service'], 'required'],
            [['id_service'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['id_service'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['id_service' => 'id_service']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_speciality' => 'Id Speciality',
            'title' => 'Title',
            'id_service' => 'Id Service',
        ];
    }

    /**
     * Gets query for [[Doctors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctor::className(), ['id_speciality' => 'id_speciality']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'id_service']);
    }
}
