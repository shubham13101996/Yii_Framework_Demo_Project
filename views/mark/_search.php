<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchMarks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marks-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rno') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'english') ?>

    <?= $form->field($model, 'maths') ?>

    <?= $form->field($model, 'hindi') ?>

    <?php // echo $form->field($model, 'createAt') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
