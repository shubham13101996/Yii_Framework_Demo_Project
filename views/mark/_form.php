<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\SecurityHelper;

/** @var yii\web\View $this */
/** @var app\models\Marks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marks-form">
    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //= $form->field($model, 'id')->hiddenInput(["value"=>$id])->label(false) ?>

    <?= $form->field($model, 'id')->hiddenInput(["value"=>SecurityHelper::validateData(Yii::$app->request->get('id'))])->label(false) ?>


    <?= $form->field($model, 'english')->textInput() ?>

    <?= $form->field($model, 'maths')->textInput() ?>

    <?= $form->field($model, 'hindi')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
