<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment_patient".
 *
 * @property int $id_appointment
 * @property string $date_appointment
 * @property int $id_patient
 * @property int $id_doctor
 *
 * @property Doctor $doctor
 * @property Patient $patient
 */
class Appointmentpatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_appointment', 'date_appointment', 'id_patient', 'id_doctor'], 'required'],
            [['id_appointment', 'id_patient', 'id_doctor'], 'integer'],
            [['date_appointment'], 'safe'],
            [['id_doctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id_doctor' => 'id']],
            [['id_patient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['id_patient' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_appointment' => 'Id Appointment',
            'date_appointment' => 'Date Appointment',
            'id_patient' => 'Id Patient',
            'id_doctor' => 'Id Doctor',
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id_doctor']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['id' => 'id_patient']);
    }
}
