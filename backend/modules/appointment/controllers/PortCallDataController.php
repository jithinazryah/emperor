<?php

namespace backend\modules\appointment\controllers;

use Yii;
use common\models\PortCallData;
use common\models\PortCallDataDraft;
use common\models\PortCallDataRob;
use common\models\Appointment;
use common\models\PortCallDataAdditional;
use common\models\AppointmentSearch;
use common\models\PortCallDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PortCallDataController implements the CRUD actions for PortCallData model.
 */
class PortCallDataController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PortCallData models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new AppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PortCallData model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PortCallData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $appointment = Appointment::find($id)->one();
        $model = new PortCallData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('create', [
                        'model' => $model,
                        'appointment' => $appointment,
            ]);
        }
    }

    /**
     * Updates an existing PortCallData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model_draft = PortCallDataDraft::findOne(['appointment_id' => $model->appointment_id]);
        $model_rob = PortCallDataRob::findOne(['appointment_id' => $model->appointment_id]);
        $model_add = new PortCallDataAdditional();
        if ($model->load(Yii::$app->request->post()) &&  Yii::$app->SetValues->Attributes($model) && $this->dateformat($model,$_POST['PortCallData']) && $model->save()) {
            return $this->redirect(['update',
                        'id' => $model->id,
                        'model' => $model,
                        'model_draft' => $model_draft,
                        'model_rob' => $model_rob,
                        '$model_add' => $model_add,
            ]);
        }
        else {
            return $this->render('update', [
                        'model' => $model,
                        'model_draft' => $model_draft,
                        'model_rob' => $model_rob,
            ]);
        }
    }

    /**
     * Deletes an existing PortCallData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PortCallData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PortCallData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = PortCallData::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function DateFormat($model, $data) {
        if ($model != null && $data != '') {
            $a = ['additional_info', 'comments', 'status'];
            foreach ($data as $key => $dta) {
                if (!in_array($key, $a)) {
                    if (strlen($dta) < 15 && $dta != NULL)
                        $model->$key = $this->ChangeFormat($dta);
                }
            }
        }
        return $model;
    }

    public function ChangeFormat($data) {
//        echo $data;
//        exit;
        $day = substr($data, 0, 2);
        $month = substr($data, 2, 2);
        $year = substr($data, 4, 4);
        $hour = substr($data, 8, 2);
        $min = substr($data, 10, 2);
        
//        echo $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $min.':00 </br>';
//        echo '2016-08-17 00:00:00';
//        exit;
        return $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $min.':00';
    }

}
