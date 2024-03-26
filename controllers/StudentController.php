<?php

namespace app\controllers;
use app\components\SecurityHelper;
use app\models\StateMaster;
use yii\web\UploadedFile;
use app\models\Student;
use app\models\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Student models.
     *
     * @return string
     */


    public function actionStateDistrict($state_name)
    {
        $districts = StateMaster::getDistrictList($state_name);
        $content = '<option value="">Select</option>';
        if (!empty($districts)) {
            foreach ($districts as $district) {
                $content .= "<option value='" . $district . "'>" . $district . "</option>";
            }
        }
        return $this->renderPartial('state-district', ['content' => $content]);
    }


    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $actualData = $dataProvider->getModels();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'userData' => $actualData
        ]);
    }

    /**
     * Displays a single Student model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */





//    public function actionSavedata()
//    {
//        $data = $this->request->post();
//        $model = $this->findModel($data["Student"]["id"]);
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }

    public function actionView($id)
    {
        $new_Id = SecurityHelper::validateData($id);
//        echo $new_Id;
        $marksData = Yii::$app->db->createCommand("select english,hindi,maths,rno from smanagement.marks where id  = $new_Id")->queryAll();


        return $this->render('view', [
            'model' => $this->findModel($new_Id),
            'marksData' =>$marksData
        ]);

    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Student();

//        $model->scenario='shubham';

        if ($this->request->isPost) {
//            var_dump($_POST); die;
            if ($model->load($this->request->post()) ) {
//                print_r($this->request->post());
//                die;


//              if(!$model->logo){
//
//                $model->save();
//                return $this->redirect(['view', 'id'=> SecurityHelper::validateData($model->id)]);
//
//              }
                $imageName = $model->name . time();
                $model->logo = UploadedFile::getInstance($model,'logo');
                $model->logo->saveAs('uploads/'.$imageName.'.'.$model->logo->extension);

                $model->logo = 'uploads/'.$imageName.'.'.$model->logo->extension;
                $model->save();
                return $this->redirect(['view', 'id'=> SecurityHelper::hashData($model->id)]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $newID = SecurityHelper::validateData($id);
//        $model = $this->findModel($newID);
//
//        if ($this->request->isPost && $model->load($this->request->post()) ) {
//
//            if($model->logo){
//                $imageName =$model->name . time();
//                $model->logo = UploadedFile::getInstance($model,'logo');
//                $model->logo->saveAs('uploads/'.$imageName.'.'.$model->logo->extension);
//
//                $model->logo = 'uploads/'.$imageName.'.'.$model->logo->extension;
//
//
//            }
//            $model->save();
//            return $this->redirect(['view', 'id' => SecurityHelper::hashData($id)  ]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//
//        ]);
//    }


    public function actionUpdate($id)
    {
        $newID = SecurityHelper::validateData($id);
        $model = $this->findModel($newID);

        if ($this->request->isPost) {
//            var_dump($_POST); die;
            if ($model->load($this->request->post()) ) {
//                print_r($this->request->post());
//                die;


//              if(!$model->logo){
//
//                $model->save();
//                return $this->redirect(['view', 'id'=> SecurityHelper::validateData($model->id)]);
//
//              }
                $imageName = $model->name . time();
                $model->logo = UploadedFile::getInstance($model,'logo');
                $model->logo->saveAs('uploads/'.$imageName.'.'.$model->logo->extension);

                $model->logo = 'uploads/'.$imageName.'.'.$model->logo->extension;
                $model->save();
                return $this->redirect(['view', 'id'=> SecurityHelper::hashData($model->id)]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}


//namespace app\controllers;
//
//use app\models\Student;
//use app\models\studentSearch;
//use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;
//
///**
// * StudentController implements the CRUD actions for Student model.
// */
//class StudentController extends Controller
//{
//    /**
//     * @inheritDoc
//     */
//    public function behaviors()
//    {
//        return array_merge(
//            parent::behaviors(),
//            [
//                'verbs' => [
//                    'class' => VerbFilter::className(),
//                    'actions' => [
//                        'delete' => ['POST'],
//                    ],
//                ],
//            ]
//        );
//    }
//
//    /**
//     * Lists all Student models.
//     *
//     * @return string
//     */
//    public function actionIndex()
//    {
//        $searchModel = new studentSearch();
//        $dataProvider = $searchModel->search($this->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
//
//    /**
//     * Displays a single Student model.
//     * @param int $id ID
//     * @return string
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
//
//    /**
//     * Creates a new Student model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return string|\yii\web\Response
//     */
//    public function actionCreate()
//    {
//        $model = new Student();
//
//        if ($this->request->isPost) {
////            var_dump($_POST);die;
//            if ($model->load($this->request->post()) && $model->save()) {
//                return $this->redirect(['view', 'id' => $model->id]);
//            }
//        } else {
//            $model->loadDefaultValues();
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Updates an existing Student model.
//     * If update is successful, the browser will be redirected to the 'view' page.
//     * @param int $id ID
//     * @return string|\yii\web\Response
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//
//        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Deletes an existing Student model.
//     * If deletion is successful, the browser will be redirected to the 'index' page.
//     * @param int $id ID
//     * @return \yii\web\Response
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }
//
//    /**
//     * Finds the Student model based on its primary key value.
//     * If the model is not found, a 404 HTTP exception will be thrown.
//     * @param int $id ID
//     * @return Student the loaded model
//     * @throws NotFoundHttpException if the model cannot be found
//     */
//    protected function findModel($id)
//    {
//        if (($model = Student::findOne(['id' => $id])) !== null) {
//            return $model;
//        }
//
//        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
//    }
//}
