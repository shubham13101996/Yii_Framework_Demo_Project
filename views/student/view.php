<?php
//
//use yii\helpers\Html;
//use yii\widgets\DetailView;
//
///** @var yii\web\View $this */
///** @var app\models\Student $model */
//
//$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
//?>
<!--<div class="student-view">-->
<!---->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?php //= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
<!--    </p>-->
<!---->
<!--    --><?php //= DetailView::widget([
//        'model' => $model,
//        'attributes' => [
//            'id',
//            'name',
//            'category',
//            'mobile',
//            'email:email',
////            'createdAt',
//        ],
//    ]) ?>
<!---->
<!--</div>-->


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="student-view">
    <!--    --><?php //= $isMarks?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'),
            [
                'update',
                'id' => SecurityHelper::hashData($model->id)
            ],
            [
                'class' => 'btn btn-primary'
            ])
        ?>

        <?php if(!empty($marksData)):?>
            <?= Html::a(Yii::t('app', 'UpdateMarks'),
                [
                    'mark/update', 'id' =>  SecurityHelper::hashData($model->id)
                ],
                [
                    'class' => 'btn btn-success',
                    'data' =>
                        [
                            'method' => 'post',
                        ],
                ])
            ?>
        <?php  else :?>

            <?= Html::a(Yii::t('app', 'AddMarks'),
                [
                    'mark/create', 'id' =>  SecurityHelper::hashData($model->id)
                ],
                [
                    'class' => 'btn btn-success'
                ])
            ?>

        <?php endif; ?>


        <!--        --><?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
        //            'class' => 'btn btn-danger',
        //            'data' => [
        //                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
        //                'method' => 'post',
        //            ],
        //        ]) ?>
    </p>
    <?php if ($model->logo): ?>
        <?= Html::img(Yii::$app->request->baseUrl . '/' . $model->logo, ['alt' => 'Image']) ?>
    <?php else: ?>
        <p>No image available</p>
    <?php endif; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            [
//                'attribute'=>'imageFile',
//                'format'=>'image',
//                'value' => function($model) {
//                    return !empty($model->logo) ? \http\Url::toRoute([$model->logo], true) : null;
//                },
//            ],
            'name',
            'category',

            'mobile',
            'email',
            'createdAt',
        ],
    ]) ?>

</div>