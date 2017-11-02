<?php

namespace app\controllers;

use app\models\LlCompany;
use app\models\LlIso;
//use Faker\Provider\Company;
use Yii;

use app\models\CertificateSearch;
use app\models\Certificate;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


/**
 * CertificateController implements the CRUD actions for Certificate model.
 */
class CertificateController extends Controller
{
    /**
     * @inheritdoc
     */


 
public function actionReport() {
    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('_certificate');
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
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
        //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/styles.css',
        // any css to be embedded if required
        //'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'LL-C Certificate'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['LL-C'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
}
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionGetCompanyAddress($company_id)
    {

        $c = LlCompany::find()->where(['company_id' => $company_id, 'is_deleted' => 0])->one();
        $address = ucfirst($c->flat_no) . ', ' . ucfirst($c->street) . ', ' . ucfirst($c->landmark) . ', ' . ucfirst($c->area) . ', ' . ucfirst($c->city) . ', ' . ucfirst($c->pincode) . ', ' . ucfirst($c->state) . ', ' . ucfirst($c->country);
        return $address;

    }

    /**
     * Lists all Certificate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CertificateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Certificate model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Certificate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Certificate();

        if ($model->load(Yii::$app->request->post()))
            {
                $var = $model->to_date;
                $to_date = date("Y-m-d", strtotime($var));
                $model->to_date = $to_date; 

                $var2 = $model->from_date;
                $from_date = date("Y-m-d", strtotime($var2));
                $model->from_date = $from_date; 

                $var3 = $model->reminder_date;
                $reminder_date = date("Y-m-d", strtotime($var2));
                $model->reminder_date = $reminder_date;
                $model->save();

            $maxId = Certificate::find()->select('certificate_id')->orderBy('certificate_id DESC')->one();
            if (empty($maxId)) {
                $cer_code = '91' . +1;
            } else {
                $cer_code = '91' . $maxId->certificate_id + 1;
            }


            $model->certificate_code = (string)$cer_code;
            if ($model->save()) {

            } else {
                print_r($model->errors);
                exit();
            }


            return $this->redirect(['view', 'id' => $model->certificate_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Certificate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->certificate_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Certificate model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
        $model = $this->findModel($id);
        $model->is_deleted = 1;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Certificate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Certificate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Certificate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
