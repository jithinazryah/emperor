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
use common\models\ImigrationClearance;

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
        } else {
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
        $model_appointment = Appointment::findOne(['id' => $id]);
        $model = PortCallData::findOne(['appointment_id' => $id]);
        $model_draft = PortCallDataDraft::findOne(['appointment_id' => $id]);
        $model_rob = PortCallDataRob::findOne(['appointment_id' => $id]);
        $model_imigration = ImigrationClearance::findOne(['appointment_id' => $id]);
        if (empty($model_appointment))
            throw new \yii\web\HttpException(404, 'This Appointment could not be found.Eroor Code:1001');
        $model_add = new PortCallDataAdditional();

        if ($this->Check($id, $model, $model_draft, $model_rob, $model_imigration)) {
            $model = PortCallData::findOne(['appointment_id' => $id]);
            $model_draft = PortCallDataDraft::findOne(['appointment_id' => $id]);
            $model_rob = PortCallDataRob::findOne(['appointment_id' => $id]);
            $model_imigration = ImigrationClearance::findOne(['appointment_id' => $id]);
        } else {

            throw new \yii\web\HttpException(404, 'This Appointment could not be found.Eroor Code:1002');
        }

        if ($model->load(Yii::$app->request->post()) && $model_imigration->load(Yii::$app->request->post())) {
            $this->saveportcalldata($model, $model_imigration);
        } else if ($model_rob->load(Yii::$app->request->post()) && $model_draft->load(Yii::$app->request->post())) {
            $this->saveportcalldraftrob($model_rob, $model_draft);
        }
        //$model_immigration = new ImigrationClearance();
        return $this->render('update', [
                    'model' => $model,
                    'model_draft' => $model_draft,
                    'model_rob' => $model_rob,
                    'model_add' => $model_add,
                    'model_imigration' => $model_imigration,
                    'model_appointment' => $model_appointment,
        ]);
    }

    public function SavePortcallData($model, $model_imigration) {
        //var_dump($model_imigration);exit;
        Yii::$app->SetValues->Attributes($model);
        Yii::$app->SetValues->Attributes($model_imigration);
        $this->dateformat($model, $_POST['PortCallData']);
        $this->dateformat($model_imigration, $_POST['ImigrationClearance']);
        $model->save();
        $model_imigration->save();
        /* $arr = [];
          $i = 0;
          foreach ($_POST['1'] as $val) {
          // $arr[$i]['label'] =
          //var_dump($val);
          }exit; */
        /* return $this->redirect(['update',
          'id' => $id,
          ]); */
    }

    public function SavePortcallDraftRob($model_rob, $model_draft) {
        Yii::$app->SetValues->Attributes($model_draft);
        Yii::$app->SetValues->Attributes($model_rob);
        if ($model_draft->validate() && $model_rob->validate()) {
            $model_draft->save();
            $model_rob->save();
        }
    }

    public function Check($id, $model, $model_draft, $model_rob, $model_imigration) {
        //echo 'hai';exit;
        if ($model != null && $model_draft != null && $model_rob != null && $model_imigration != null) {
            return true;
        } else {
            if ($model == null) {
                $model = new PortCallData();
                $model->appointment_id = $id;
                $model->save();
            }
            if ($model_draft == null) {
                $model_draft = new PortCallDataDraft();
                $model_draft->appointment_id = $id;
                $model_draft->save();
            }
            if ($model_rob == null) {
                $model_rob = new PortCallDataRob();
                $model_rob->appointment_id = $id;
                $model_rob->save();
            }
            if ($model_imigration == null) {
                $model_imigration = new ImigrationClearance();
                $model_imigration->appointment_id = $id;
                $model_imigration->save();
            }
            return true;
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
        } else {
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
        $day = substr($data, 0, 2);
        $month = substr($data, 2, 2);
        $year = substr($data, 4, 4);
        $hour = substr($data, 9, 2);
        $min = substr($data, 11, 2);

//        echo $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $min.':00 </br>';
//        echo '2016-08-17 00:00:00';
//        exit;
        return $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $min . ':00';
    }

}
