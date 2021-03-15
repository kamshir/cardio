<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $password
 * @property string $birthday
 * @property string|null $image
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $street
 * @property string $num_house
 * @property string $num_appartament
 *
 * @property AppointmentPatient[] $appointmentPatients
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $rememberMe = true;

    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'middle_name', 'birthday', 'phone', 'email', 'city', 'street', 'num_house', 'num_appartament'], 'required'],
            [['birthday'], 'safe'],
            [['first_name', 'last_name', 'middle_name'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 255],
            [['phone', 'email', 'city', 'street', 'num_house', 'num_appartament'], 'string', 'max' => 50],
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
            'birthday' => 'Дата рождения',
            'image' => 'Фото',
            'phone' => 'Телефон',
            'email' => 'Email',
            'city' => 'Город',
            'street' => 'Улица',
            'num_house' => '№ Дома',
            'num_appartament' => '№ Кв.',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * Gets query for [[AppointmentPatients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentPatients()
    {
        return $this->hasMany(AppointmentPatient::className(), ['id_patient' => 'id']);
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }

    public function reg(){
        if ($this->validate()){
            if ($this->rememberMe){
                $u = $this->getUser();
                $u->generateAuthKey();
                $u->save();
            }
            
            return true;
        }
        else {
            return false;
        }
    }
}
