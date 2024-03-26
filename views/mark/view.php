<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */
$name = \app\models\Student::findOne($model->id);

$this->title = $name->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' =>SecurityHelper::hashData( $model->id)], ['class' => 'btn btn-primary']) ?>
<!--        --><?php //= Html::a(Yii::t('app', 'Delete'), ['delete', 'rno' => $model->rno], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rno',
            'id',
            'english',
            'maths',
            'hindi',
//            'createAt',
//            'updatedAt',
        ],
    ]) ?>

</div>
