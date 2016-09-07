<?php

namespace backend\modules\appointment\controllers;

use Yii;
use common\models\CloseEstimate;
use common\models\Appointment;
use common\models\CloseEstimateSearch;
use common\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\EstimatedProforma;

/**
 * CloseEstimateController implements the CRUD actions for CloseEstimate model.
 */
class CloseEstimateController extends Controller {

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
         * Lists all CloseEstimate models.
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
         * Displays a single CloseEstimate model.
         * @param integer $id
         * @return mixed
         */
        public function actionView($id) {
                return $this->render('view', [
                            'model' => $this->findModel($id),
                ]);
        }

        /**
         * Creates a new CloseEstimate model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate() {
                $model = new CloseEstimate();
                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                        return $this->render('create', [
                                    'model' => $model,
                        ]);
                }
        }

        public function actionAdd($id, $prfrma_id = NULL) {
                $estimates = CloseEstimate::findAll(['apponitment_id' => $id]);
                if(empty($estimates)){
                        $this->InsertCloseEstimate($id);
                }
                $appointment = Appointment::find($id)->one();
                if (!isset($prfrma_id)) {
                        $model = new CloseEstimate;
                } else {
                        $model = $this->findModel($prfrma_id);
                }

                if ($model->load(Yii::$app->request->post()) && $this->SetValues($model, $id) && $model->save()) {
                        return $this->refresh();
                } else {
                        return $this->render('add', [
                                    'model' => $model,
                                    'estimates' => $estimates,
                                    'appointment' => $appointment,
                        ]);
                }
        }
        
        /*
         * 
         */
        public function InsertCloseEstimate($id){
                $estimates = EstimatedProforma::findAll(['apponitment_id' => $id]);
                foreach ($estimates as $estimate) {
                       $closeestimate = new CloseEstimate;
                       $closeestimate->attributes = $estimate->attributes;
                       $closeestimate->DOC  = date('y-m-d');
                       $closeestimate->save();
                }     
                return true;          
        }

                public function actionDeleteCloseEstimate($id){
                
        $this->findModel($id)->delete();

        //return $this->redirect(['index']); 
        return $this->redirect(Yii::$app->request->referrer);
    }

        /**
         * Updates an existing CloseEstimate model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdate($id) {
                echo 'update';exit;
                $model = $this->findModel($id);
                var_dump($model);exit;
                if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model, $id) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->id]);
                } else {
                        return $this->render('update', [
                                    'model' => $model,
                        ]);
                }
        }

        /**
         * Deletes an existing CloseEstimate model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         */
        public function actionDelete($id) {
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
        }

        /**
         * Finds the CloseEstimate model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return CloseEstimate the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id) {
                if (($model = CloseEstimate::findOne($id)) !== null) {
                        return $model;
                } else {
                        throw new NotFoundHttpException('The requested page does not exist.');
                }
        }

        protected function SetValues($model, $id) {

                if (Yii::$app->SetValues->Attributes($model)) {
                        $model->setAttribute('apponitment_id', $id);
                        return true;
                } else {
                        return false;
                }
        }

}
