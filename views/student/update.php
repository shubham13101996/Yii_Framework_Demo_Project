<?php

use yii\helpers\Html;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$name = \app\models\Student::findOne($model->id);

$this->title = Yii::t('app', 'Update Student: {name}', [
    'name' => $name['name'],
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => SecurityHelper::hashData($model->id)]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
