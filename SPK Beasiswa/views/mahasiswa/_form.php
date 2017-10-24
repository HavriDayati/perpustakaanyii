<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\JenisKelamin;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */
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

<div class="mahasiswa-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Mahasiswa</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'id_mhs')->textInput() ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        
        <?= $form->field($model, 'id_jenis_kelamin')->widget(select2::className(), [
            'data' => JenisKelamin::getList(),
            'options' => [
                'placeholder' => 'Pilih Jenis Kelamin',
            ]
        ]) ?>

        

        <?= $form->field($model, 'tgl_lhr')->widget(DatePicker::ClassName(),[
            'options' => ['placeholder' => 'Pilih Tanggal'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-d',
                'autoclose' =>true
            ],
        ]) ?>

        <?= $form->field($model, 'photo')->fileInput() ?>


	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
