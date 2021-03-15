<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id_appointment
 * @property string $date_appointment
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $phone
 * @property string $email
 * @property string|null $comment
 *
 * @property Doctor $id0
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    public $date_appointment;
    public $id;
    public $first_name;
    public $last_name;
    public $middle_name;
    public $phone;
    public $email;
    public $comment;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_appointment', 'id', 'first_name', 'last_name', 'middle_name', 'phone', 'email'], 'required'],
            [['id'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'comment'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_appointment' => 'Id Appointment',
            'date_appointment' => 'Дата записи',
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'middle_name' => 'Отчество',
            'phone' => 'Телефон',
            'email' => 'Email',
            'comment' => 'Комментарий',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id']);
    }

    public function send($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->params['site']])
                ->setTo($this->email)
                ->setSubject('Заявка на приём')
                ->setHtmlBody('Здравствуйте, <strong>' . $this->first_name . ' ' . $this->last_name . '</strong>. Ваше сообщение успешно доставлено. Наши диспетчеры свяжуться с вами вближайшее время.')
                ->send();

            Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->params['site']])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject('Заявка от пользователя')
                ->setHtmlBody('<strong>' . $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name . '</strong> оставил вам заявку на запись на прием:<br><br>Врач: ' . $this->id .  '<br>Телефон: ' . $this->phone .  '<br>Почта: ' . $this->email .  '<br>Время приема: ' . $this->date_appointment)
                ->send();

            return true;
        }
        return false;
    }
}
