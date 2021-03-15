<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;
use app\models\Social;

/**
 * This is the model class for table "doctor".
 * 
 * @property int $id_doctor
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $image
 * @property int $id_speciality
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
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'id_speciality', 'status', 'description'], 'required'],
            [['id_speciality'], 'integer'],
            [['phone', 'email'], 'string', 'max' => 255],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 255],
            [['id_speciality'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['id_speciality' => 'id_speciality']],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['quotes'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'middle_name' => 'Отчество',
            'image' => 'Фото',
            'phone' => 'Телефон',
            'email' => 'Email',
            'description' => 'Описание',
            'quotes' => 'Цитата',
            'id_speciality' => 'Специальность',
            'status' => 'Статус'
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }
        else {
            return false;
        }
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

    public function getSocials()
    {
        return $this->hasMany(Social::className(), ['id' => 'id']);
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
    public function getWorkingDays()
    {
        return $this->hasMany(WorkingDay::className(), ['id' => 'id']);
    }
}
