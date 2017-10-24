<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\Semester;


/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */
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

<div class="kriteria-form box box-primary">

    <div class="box-header">
        <h3 class="box-title">Form Kriteria</h3>
    </div>
	<div class="box-body">

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ipk')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'penghasilan_ortu')->textInput() ?>

        <?= $form->field($model, 'jml_tanggungan')->textInput() ?>

        <?= $form->field($model, 'id_semester')->widget(Select2::classname(), 
            [
                'data' => Semester::getList(),
                'options' => ['placeholder' => 'Pilih Semester',
    
    ]
]); ?>

        <?= $form->field($model, 'usia')->textInput() ?>


	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
