<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id_comment
 * @property int $id
 * @property string $comment
 *
 * @property Doctor $id0
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $id;
    public $comment;


    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'comment'], 'required'],
            [['id'], 'integer'],
            [['date'], 'safe'],
            [['comment'], 'string', 'max' => 100],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comment' => 'Id Comment',
            'id' => 'ID',
            'comment' => 'Comment',
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
