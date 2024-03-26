<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marks".
 *
 * @property int $rno
 * @property int|null $id
 * @property int|null $english
 * @property int|null $maths
 * @property int|null $hindi
 * @property string $createdAt
 * @property string $updatedAt
 *
 * @property Student $id0
 */
class Marks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'english', 'maths', 'hindi'], 'required'],
            [['id', 'english', 'maths', 'hindi'], 'integer'],
            [['english', 'maths', 'hindi'], 'integer','min'=>0,'max'=>100],
            [['createdAt', 'updatedAt'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::class, 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rno' => Yii::t('app', 'Rno'),
            'id' => Yii::t('app', 'ID'),
            'english' => Yii::t('app', 'English'),
            'maths' => Yii::t('app', 'Maths'),
            'hindi' => Yii::t('app', 'Hindi'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Student::class, ['id' => 'id']);
    }
}
