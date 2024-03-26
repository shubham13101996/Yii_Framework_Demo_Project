<?php

namespace app\models;

use Yii;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "state_master".
 *
 * @property int $id
 * @property string $statename
 * @property string $districtname
 */
class StateMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','statename', 'districtname'], 'required'],
            [['id','required']],
            [['statename', 'districtname'], 'string', 'max' => 30],
          [['id'], 'unique']
        ];
    }

    public static function getStatesList(){
        $districts = self::find()
            ->select('statename')
//            ->where(['id' => $stateId])
            ->all();

        return ArrayHelper::map($districts,'statename','statename');
    }
    public static function getDistrictList($stateName)
    {
        $districts = self::find()
            ->select('districtname')
            ->where(['statename' => $stateName])
            ->all();

        return ArrayHelper::map($districts,'districtname','districtname');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'statename' => Yii::t('app', 'Statename'),
            'districtname' => Yii::t('app', 'Districtname'),
        ];
    }
}
