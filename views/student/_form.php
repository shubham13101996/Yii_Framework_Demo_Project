<?php
$categoryOptions = ['GEN'=>'GEN',"OBC"=>'OBC','ST'=>'ST',"SC"=>'SC'];

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Student $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!--    --><?php //= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<!--    --><?php //= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--    --><?php //= $form->field($model, 'category')->textInput(['maxlength' => true])->dropDownList($categoryOptions,[
//        'prompt' => 'Select Category',
//        'id' => 'category-dropdown',
//    ]) ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true])->dropDownList(['GEN'=>'GEN','OBC'=>'OBC','SC'=>'SC','ST'=>'ST'], [
            'prompt'=>"Select Category",
        'onchange' => new \yii\web\JsExpression('
        if ($(this).val() === "GEN") {
            $("#certi_num").hide();
            $("#certi_num").val("N/A"); // Clear value when switching to GEN
        } else {
            $("#certi_num").show();
        }
    '),
    ]) ?>

    <div id="certi_num" style="display: none;">  <?= $form->field($model, 'certificate_no')->textInput(['maxlength' => true]) ?>
    </div>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true])->dropDownList(['MALE'=>'MALE',"FEMALE"=>'FEMALE','OTHER'=>'OTHER'],[
        'prompt'=>"Select Gender",
    ]) ?>


    <?= $form->field($model, 'add_state')->dropDownList(\app\models\StateMaster::getStatesList(), [
        'prompt' => 'Select State',
        'onchange' => '
                            $.post( "' . Yii::$app->urlManager->createUrl('student/state-district?state_name=') . '"+$(this).val(), function( data ) {
                              $( "#student-add_district" ).html( data );
                            });
                        ']) ?>



    <?= $form->field($model, 'add_district')->dropDownList(\app\models\StateMaster::getDistrictList($model->add_state), ['prompt' => 'Select District']) ?>


    <?= $form->field($model, 'logo')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
    </div>

<!--    --><?php
//    $this->registerJs("
//    $('#category-dropdown').change(function(){
//        if ($(this).val() !== 'General') {
//            $('#student-certificate_number').closest('.student').show();
//        } else {
//            $('#student-certificate_number').val('').closest('.form-group').hide();
//        }
//    }).change();
//");
//    ?>

    <?php ActiveForm::end(); ?>

</div>
