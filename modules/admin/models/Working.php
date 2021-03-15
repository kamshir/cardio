<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "working".
 *
 * @property int $id_working_day
 * @property string $day
 * @property string $work_from
 * @property string $work_to
 * @property int $id
 *
 * @property Doctor $id0
 */
class Working extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'work_from', 'work_to', 'id'], 'required'],
            [['work_from', 'work_to'], 'safe'],
            [['id'], 'integer'],
            [['day'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_working_day' => 'ID',
            'day' => 'День',
            'work_from' => 'Начало смены',
            'work_to' => 'Конец смены',
            'id' => 'ID Врача',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'id']);
    }
}
