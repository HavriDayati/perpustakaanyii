<?php

namespace app\controllers;

use Yii;
use app\models\Buku;
use app\models\BukuSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all Buku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCari()
    {
        return $this->render('cari');
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Buku();
        if ($model->load(Yii::$app->request->post()) ) {
            
            $cover = UploadedFile::getInstance($model,'cover');
            if($cover !== null){
                $model->cover = $cover->baseName . Yii::$app->formatter->asTimestamp(date('Y')) . '.' . $cover->extension;
                /*print $cover->extension;
                die;*/
            }
            if($model->save()) {
                    if ($cover!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $cover->saveAs($path.$model->cover, false);
                }
            Yii::$app->session->setFlash('success','Data berhasil disimpan.');
            return $this->redirect(['view', 'id' => $model->id]);
            }
             Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        } 
            return $this->render('create', [
                'model' => $model,
            ]);
    }
    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $foto_lama = $model->cover;
        if ($model->load(Yii::$app->request->post()) ) {
            $cover = UploadedFile::getInstance($model,'cover');
             if($cover !== null){
                $model->cover = $cover->baseName . Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')) . '.' . $cover->extension;
            } else {
                $model->cover = $foto_lama;
            }
            if($model->save()) {
                    if ($cover!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $cover->saveAs($path.$model->cover, false);
                     }
            Yii::$app->session->setFlash('success','Data berhasil disimpan.');
            return $this->redirect(['view', 'id' => $model->id]);
            } 
            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        }
            return $this->render('update', [
                'model' => $model,
            ]);
        
    }


    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function exportExcel($params)
    {
        $PHPExcel = new \PHPExcel();

        $PHPExcel->setActiveSheetIndex();

        $sheet = $PHPExcel->getActiveSheet();

        $sheet->getDefaultStyle()->getAlignment()->setWrapText(true);
        $sheet->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $setBorderArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => \PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );


        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Jenis Buku');
        $sheet->setCellValue('D3', 'Penulis');
        $sheet->setCellValue('E3', 'Cover');

        $PHPExcel->getActiveSheet()->setCellValue('A1', 'Data Buku');

        $PHPExcel->getActiveSheet()->mergeCells('A1:E1');

        $sheet->getStyle('A1:E3')->getFont()->setBold(true);
        $sheet->getStyle('A1:E3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new HonorSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->nama);
            $sheet->setCellValue('C' . $row, $data->id_jenis);
            $sheet->setCellValue('D' . $row, $data->id_penulis);
            $sheet->setCellValue('E' . $row, $data->cover);
            
            $i++;
        }

        $sheet->getStyle('A3:E' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:E' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:E' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:E' . $row)->applyFromArray($setBorderArray);

        $path = 'exports/';
        $filename = time() . '_DataBuku.xlsx';
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save($path.$filename);
        return Yii::$app->getResponse()->redirect($path.$filename);
    }
    public function actionViewExportPdf($id)
    {
        // get your HTML raw content without any layouts or scripts
        $model = $this->findModel($id);
        $content = '';
        $content .= $this->renderPartial('_viewPdf', ['model' => $model]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'marginTop' => 5,
            'marginLeft' => 5,
            'marginRight' => 5,
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'defaultFont' => 'times',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:22px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Detail Buku'],
             // call mPDF methods on the fly
        ]);
        // return the pdf output as per the destination setting
        return $pdf->render();
    }    
}
