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
use kartik\mpdf\Pdf;
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
                        'id' => $id,
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
    
    public function actionReport() {
                // get your HTML raw content without any layouts or scripts
                $content = $this->renderPartial('pdf');

                // setup kartik\mpdf\Pdf component
                $pdf = new Pdf([
                    // set to use core fonts only
                    //'mode' => Pdf::MODE_CORE,
                    // A4 paper format
                    'format' => Pdf::FORMAT_A4,
                    // portrait orientation
                    'orientation' => Pdf::ORIENT_PORTRAIT,
                    // stream to browser inline
                    'destination' => Pdf::DEST_BROWSER,
                    // your html content input
                    'content' => $content,
                    // format content from your own css file if needed or use the
                    // enhanced bootstrap css built by Krajee for mPDF formatting 
                    'cssFile' => '@backend/web/css/pdf.css',
                    // any css to be embedded if required
                    //'cssInline' => '.kv-heading-1{font-size:18px}',
                    // set mPDF properties on the fly
                    //'options' => ['title' => 'Krajee Report Title'],
                    // call mPDF methods on the fly
                    'methods' => [
                        'SetHeader' => ['Estimated proforma generated on '.date("d/m/Y h:m:s")],
                        'SetFooter' => ['|page {PAGENO}'],
                    ]
                ]);

                // return the pdf output as per the destination setting
                return $pdf->render();
        }

}
