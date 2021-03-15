<?php

namespace app\models;

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
            'id_working_day' => 'Id Working Day',
            'day' => 'Day',
            'work_from' => 'Work From',
            'work_to' => 'Work To',
            'id' => 'ID',
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

    public static function doctors($arr){
        $docs = array();

        foreach ($arr as $doc){
            $docs[] = $doc->doctor->id;
        }
        $docs = array_unique($docs, SORT_NUMERIC);

        return $docs;
    }
}
