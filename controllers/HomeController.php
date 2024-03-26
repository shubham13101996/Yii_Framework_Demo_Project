<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;

class HomeController extends Controller
{


    public function actionIndex()
    {
        $data = Yii::$app->db->createCommand("select * from students")->queryAll();
         print_r($data);
    }

    public  function actionTest()
    {
        return "Hello testable";
    }
}