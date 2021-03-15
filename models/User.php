<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{


    public static function tableName(){

        return 'user';

    }

    public function attributeLabels()
    {
        return [
            'username' => 'Никнейм',
            'password' => 'Пароль'
        ];
    }

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
            [['whois'], 'integer']
        ];
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    public function getWhoIs()
    {
        return $this->whois;
    }

    public function password(){

        $pass = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $this->password = $pass;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getPatient()
    {
        return $this->hasOne(AppointmentPatient::className(), ['id_patient' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function generateAuthKey(){

        $this->auth_key = Yii::$app->security->generateRandomString();

    }
}
