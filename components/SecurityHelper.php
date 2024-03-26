<?php

namespace  app\components;
use Yii;
class SecurityHelper extends \yii\base\Model
{

    public static function hashData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->hashData($id,Yii::$app->params['secretKey']);
        }else {

            die;
        }
    }

    public static function validateData($id)
    {
        if(!empty($id)){
            return Yii::$app->security->validateData($id,Yii::$app->params['secretKey']);
        }else{

            die;
        }

    }


}