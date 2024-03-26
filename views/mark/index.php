<?php
//
//use app\models\Marks;
use yii\helpers\Html;
use app\components\SecurityHelper;
//use yii\helpers\Url;
//use yii\grid\ActionColumn;
//use yii\grid\GridView;
//
///** @var yii\web\View $this */
///** @var app\models\searchMarks $searchModel */
///** @var yii\data\ActiveDataProvider $dataProvider */
//
//$this->title = Yii::t('app', 'Marks');
//$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="marks-index">-->
<!---->
<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>-->
<!--        --><?php //= Html::a(Yii::t('app', 'Create Marks'), ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
<!---->
<!--    --><?php //// echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    --><?php //= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'rno',
//            'id',
//            'english',
//            'maths',
//            'hindi',
//            'createAt',
//            'updatedAt',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, Marks $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'rno' => $model->rno]);
//                 }
//            ],
//        ],
//    ]); ?>
<!---->
<!---->
<!--</div>-->



<table border="2" class="table table-hover">
    <thead>
    <tr >
        <th >Name</th>
        <th  scope="col">RollNo</th>
        <th  scope="col">english</th>
        <th  scope="col">maths</th>
        <th  scope="col">hindi</th>
        <th  scope="col">UpdateData </th>
<!--        <th  scope="col">DeleteData </th>-->
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $user): ?>
        <tr class="table-primary">
            <th scope="row"><?= $user["name"] ?></th>
            <td><?= $user["rno"] ?></td>
            <td><?= $user["english"] ?></td>
            <td><?= $user["maths"] ?></td>
            <td><?= $user["hindi"] ?></td>
            <td><?= Html::a("Update",[
                    "mark/update",
                    "id"=> SecurityHelper::hashData($user["id"])],
                    ['class' => 'btn btn-success',]
                )?> </td>

<!--            <td > --><?php //= Html::a('Delete', ['mark/delete', 'rno' => $user['rno']], [
//                    'data' => [
//                        'confirm' => 'Are you sure you want to delete this record?',
//                        'method' => 'POST'],
//                    'class' => 'btn btn-danger',
//                ]) ?><!-- </td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</div>
