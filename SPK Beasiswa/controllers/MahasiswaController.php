<?php

namespace app\controllers;

use Yii;
use app\models\Mahasiswa;
use app\models\MahasiswaSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
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
     * Lists all Mahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
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
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();
        if ($model->load(Yii::$app->request->post()) ) {
            
            $photo = UploadedFile::getInstance($model,'photo');
            if($photo !== null){
                $model->photo = $photo->baseName . Yii::$app->formatter->asTimestamp(date('Y')) . '.' . $photo->extension;
                /*print $cover->extension;
                die;*/
            }
            if($model->save()) {
                    if ($photo!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $photo->saveAs($path.$model->photo, false);
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
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $foto_lama = $model->photo;
        if ($model->load(Yii::$app->request->post()) ) {
            $photo = UploadedFile::getInstance($model,'photo');
             if($photo !== null){
                $model->photo = $photo->baseName . Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')) . '.' . $photo->extension;
            } else {
                $model->photo = $foto_lama;
            }
            if($model->save()) {
                    if ($photo!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $photo->saveAs($path.$model->photo, false);
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
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);


    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
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
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Id Mhs');
        $sheet->setCellValue('D3', 'Alamat');
        $sheet->setCellValue('E3', 'Photo');
        $sheet->setCellValue('F3', 'Status');
        $sheet->setCellValue('G3', 'Id Jenis Kelamin');
        $sheet->setCellValue('H3', 'Email');
        $sheet->setCellValue('I3', 'Tgl Lhr');

        $PHPExcel->getActiveSheet()->setCellValue('A1', 'Data Mahasiswa');

        $PHPExcel->getActiveSheet()->mergeCells('A1:I1');

        $sheet->getStyle('A1:I3')->getFont()->setBold(true);
        $sheet->getStyle('A1:I3')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new MahasiswaSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->nama);
            $sheet->setCellValue('C' . $row, $data->id_mhs);
            $sheet->setCellValue('D' . $row, $data->alamat);
            $sheet->setCellValue('E' . $row, $data->photo);
            $sheet->setCellValue('F' . $row, $data->status);
            $sheet->setCellValue('G' . $row, $data->id_jenis_kelamin);
            $sheet->setCellValue('H' . $row, $data->email);
            $sheet->setCellValue('I' . $row, $data->tgl_lhr);
            
            $i++;
        }

        $sheet->getStyle('A3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:I' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:I' . $row)->applyFromArray($setBorderArray);

        $path = 'exports/';
        $filename = time() . '_DataPenduduk.xlsx';
        $objWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
        $objWriter->save($path.$filename);
        return Yii::$app->getResponse()->redirect($path.$filename);
    }

}
