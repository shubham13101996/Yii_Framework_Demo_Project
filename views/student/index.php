<?php

use app\models\Student;
use app\components\SecurityHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\studentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


//            'id',
            'name',
            [
                'attribute' => 'category',
                'filter' => $searchModel->getCategoryFilter(),
                'filterInputOptions' => ['prompt' => 'Category_filter', 'class' => 'form-control', 'id' => null],// Use getCategoryFilter method

            ],
            'mobile',
            'email:email',
            [

                'attribute'=>'gender',
                'filter' => $searchModel->getGenderFilter(),
                'filterInputOptions' => ['prompt' => 'Gender_filter', 'class' => 'form-control', 'id' => null],
                'header'=>'Gender',
                'contentOptions' => ['style' => 'color:green','class' => 'bg-red'],
                'headerOptions'=>['style' => 'color:red'],
            ],
//            'logo',
      //'certificate_no',

     // 'createdAt',
            ['class'=> 'yii\grid\ActionColumn',

                'header'=>'Action',
                'contentOptions' => ['class' => 'bg-red','margin'=>'10','style' =>'color:red', ],
                'headerOptions'=>['width'=>'90','style' => 'color:red'],
                'template'=>' {view} ',

                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' =>SecurityHelper::hashData($model->id) ]);
                }],
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Student $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 }
//            ],
        ],
    ]); ?>


</div>
