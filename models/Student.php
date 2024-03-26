<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $mobile
 * @property string $gender
 * @property string|null $category
 * @property string|null $certificate_no
 * @property string $add_district
 * @property string $add_state
 * @property string $createdAt
 * @property string $updatedAt
 * @property string|null $logo
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'mobile', 'gender', 'add_district', 'add_state','category','gender','logo'], 'required'],
            [['mobile'], 'integer'],
            [['gender'], 'string'],
            [['logo'],'file','skipOnEmpty'=>true,"extensions"=>'jpg,png,jpeg'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['name', 'email', 'add_district', 'add_state'], 'string', 'max' => 255],
            [['category'], 'string', 'max' => 20],
            [['certificate_no'], 'string', 'max' => 30],
            [['email'], 'unique'],
            [['email'], 'email'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'mobile' => Yii::t('app', 'Mobile'),
            'gender' => Yii::t('app', 'Gender'),
            'category' => Yii::t('app', 'Category'),
            'certificate_no' => Yii::t('app', 'Certificate No'),
            'add_district' => Yii::t('app', 'Add District'),
            'add_state' => Yii::t('app', 'Add State'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'logo' => Yii::t('app', 'Logo'),
        ];
    }
}
