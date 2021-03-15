<?php

namespace app\models;

use Yii;
use app\models\Speciality;
use app\models\Working;
use app\models\Social;
use app\models\Comment;

/**
 * This is the model class for table "doctor".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string|null $image
 * @property string $description
 * @property int $id_speciality
 * @property string $status 1 - Руководство, 0 - Врач
 *
 * @property Appointment[] $appointments
 * @property Speciality $speciality
 * @property Vacation[] $vacations
 * @property WorkingDay[] $workingDays
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'description', 'id_speciality', 'status'], 'required'],
            [['description', 'quotes','status'], 'string'],
            [['id_speciality'], 'integer'],
            [['phone', 'email'], 'string', 'max' => 255],
            [['first_name', 'last_name', 'middle_name', 'image'], 'string', 'max' => 255],
            [['id_speciality'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['id_speciality' => 'id_speciality']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'image' => 'Image',
            'description' => 'Description',
            'quotes' => 'Цитата',
            'id_speciality' => 'Id Speciality',
            'status' => 'Status',
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
     * Gets query for [[Appointments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id_speciality' => 'id_speciality']);
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacation::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[WorkingDays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorking()
    {
        return $this->hasMany(Working::className(), ['id' => 'id']);
    }

    public function getSocial()
    {
        return $this->hasMany(Social::className(), ['id' => 'id']);
    }

    public function getComment()
    {
        return $this->hasMany(Comment::className(), ['id_doctor' => 'id']);
    }
}
