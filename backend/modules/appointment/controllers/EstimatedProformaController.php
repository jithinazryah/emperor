<?php

namespace backend\modules\appointment\controllers;

use Yii;
use common\models\EstimatedProforma;
use common\models\Appointment;
use common\models\EstimatedProformaSearch;
use common\models\AppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstimatedProformaController implements the CRUD actions for EstimatedProforma model.
 */
class EstimatedProformaController extends Controller {

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
     * Lists all EstimatedProforma models.
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
     * Displays a single EstimatedProforma model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EstimatedProforma model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new EstimatedProforma();

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAdd($id, $prfrma_id = NULL) {
        $estimates = EstimatedProforma::findAll(['apponitment_id' => $id]);
        $appointment = Appointment::find($id)->one();
        if (!isset($prfrma_id)) {
            $model = new EstimatedProforma;
        }
        else {
            $model = $this->findModel($prfrma_id);
        }

        if ($model->load(Yii::$app->request->post()) && $this->SetValues($model, $id) && $model->save()) {
            return $this->refresh();
        }
        else {
            return $this->render('add', [
                        'model' => $model,
                        'estimates' => $estimates,
                        'appointment' => $appointment,
            ]);
        }
    }

    public function actionDeletePerforma($id){
        $this->findModel($id)->delete();

        //return $this->redirect(['index']); 
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing EstimatedProforma model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model, $id) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstimatedProforma model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        //return $this->redirect(['index']); 
        return $this->refresh();
    }

    /**
     * Finds the EstimatedProforma model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EstimatedProforma the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = EstimatedProforma::findOne($id)) !== null) {
            return $model;
        }
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function SetValues($model, $id) {

        if (Yii::$app->SetValues->Attributes($model)) {
            $model->setAttribute('apponitment_id', $id);
            return true;
        }
        else {
            return false;
        }
    }

}
