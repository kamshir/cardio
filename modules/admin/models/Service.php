<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "service".
 *
 * @property int $id_service
 * @property string $title
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
            [['title', 'id'], 'required'],
            [['id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['id_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['id_department' => 'id']],
            [['price'], 'string'],
            [['photo'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'id_department' => 'Отдел',
            'price' => 'Цена',
            'photo' => 'Фото'
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->photo->baseName . '.' . $this->photo->extension;
            $this->photo->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id_department' => 'id']);
    }

    /**
     * Gets query for [[Specialities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialities()
    {
        return $this->hasMany(Speciality::className(), ['id' => 'id_service']);
    }
}
