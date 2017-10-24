<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisKelamin;
use app\models\Jurusan;
use app\models\Semester;

/* @var $this yii\web\View */
/* @var $model app\models\DetailMahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'layout'=>'horizontal',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

<div class="detail-mahasiswa-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Detail Mahasiswa</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_mhs')->textInput() ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_jurusan')->widget(Select2::classname(), 
            [
                'data' => Jurusan::getList(),
                'options' => ['placeholder' => 'Pilih Jurusan',
    
            ]
                ]); ?>


        <?= $form->field($model, 'id_jenis_kelamin')->widget(Select2::classname(), 
            [
                'data' => JenisKelamin::getList(),
                'options' => ['placeholder' => 'Pilih Jenis Kelamin',
    
    ]
]); ?>


        <?= $form->field($model, 'ipk')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'penghasilan_ortu')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'jml_tanggungan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'id_semester')->widget(Select2::classname(), 
            [
                'data' => Semester::getList(),
                'options' => ['placeholder' => 'Pilih Semester',
    
    ]
]); ?>


        <?= $form->field($model, 'usia')->textInput(['maxlength' => true]) ?>


	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
