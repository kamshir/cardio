<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id_service
 * @property string $title
 * @property string|null $price
 * @property int $id_department
 *
 * @property Department $department
 * @property Speciality[] $specialities
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'id_department'], 'required'],
            [['id_department'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 20],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
        ];
    }

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Id Service',
            'title' => 'Title',
            'price' => 'Price',
            'id_department' => 'Id Department',
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Specialities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasMany(Speciality::className(), ['id_speciality' => 'id']);
    }
}
