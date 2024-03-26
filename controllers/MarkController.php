<?php

namespace app\controllers;

use app\models\Marks;
use app\models\searchMarks;
use app\components\SecurityHelper;
use app\widgets\Alert;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * MarksController implements the CRUD actions for Marks model.
 */
class MarkController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['delete'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Marks models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new searchMarks();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $data = Yii::$app->db->createCommand("SELECT student.name, marks.* from marks INNER JOIN student on student.id = marks.id ")->queryAll();

        return $this->render('index', [
            'data' => $data
        ]);


    }

    /**
     * Displays a single Marks model.
     * @param int $id id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $id = SecurityHelper::validateData($id);
//            echo $id;
//            $data = Yii::$app->db->createCommand("select * from marks where id = $id")->queryAll();
//            print_r($data);
//            die;
//        $model = Marks::findOne(['id' => $id]);
//        print_r($model);
//        die;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);


    }

    /**
     * Creates a new Marks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
//       if method is post
        try {
            $model = new Marks();

            if ($this->request->isPost) {

                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => SecurityHelper::hashData($id)]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                "id" =>SecurityHelper::hashData($id)
            ]);
        }
        catch (\Exception $e) {

                Yii::$app->session->setFlash('error', 'Marks should be under 100');
                return $this->render('create', [
                    'model' => $model,
                    'id'=> SecurityHelper::hashData($id)
                ]);
        }
    }

    /**
     * Updates an existing Marks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $id = SecurityHelper::ValidateData($id);
        $model = $this->findModel($id);

        try {
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => SecurityHelper::hashData($id)],);
            }
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', 'Marks should be under 100');
            return $this->render('update', [
                'model' => $model,

            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Marks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id id
     * @return Marks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marks::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }








    public function actionUserdata(){
        $data = Yii::$app->db->createCommand("SELECT student.name, marks.* from marks INNER JOIN student on student.id = marks.id ")->queryAll();
        print_r($data);
//        echo  "MyData";
    }
}


