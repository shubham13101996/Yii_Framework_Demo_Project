<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */


$name = \app\models\Student::findOne($model->id);
$this->title = Yii::t('app', 'Student: {name}', [
    'name' => $name->name,

//  'name' => Html::a($name->name, ['view', 'id' => $model->rno], ['class' => 'btn btn-danger']),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $name->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="marks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
