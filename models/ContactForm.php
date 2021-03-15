<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['fname', 'lname', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            [['phone'], 'filter', 'filter' => function ($value) {
                $result = preg_replace("/(\+7)(\d{3})(\d{3})(\d{2})(\d{2})/", "$1 ($2) $3-$4-$5", $value);
                return $result;
            }],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'fname' => 'Имя',
            'lname' => 'Фамилия',
            'email' => 'Email',
            'phone' => 'Телефон',
            'subject' => 'Тема',
            'body' => 'Сообщение',
            'verifyCode' => 'Проверочный код',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->params['site']])
                ->setTo($this->email)
                ->setSubject($this->subject)
                ->setHtmlBody('Здравствуйте, <strong>' . $this->fname . ' ' . $this->lname . '</strong>. Ваше сообщение успешно доставлено. Наши диспетчеры свяжуться с вами вближайшее время.')
                ->send();

            Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->params['site']])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setSubject($this->subject)
                ->setHtmlBody('<strong>' . $this->fname . ' ' . $this->lname . '</strong> оставил вам сообщение:<br>&laquo;<i>' . $this->body . '</i>&raquo;<br>' . '<br>Email: ' . $this->email .  '<br>Телефон: ' . $this->phone)
                ->send();

            return true;
        }
        return false;
    }
}
