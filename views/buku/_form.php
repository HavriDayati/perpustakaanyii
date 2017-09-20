<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\Jenis;
use app\models\Penulis;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */
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

<div class="buku-form box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Form Buku</h3>
    </div>
    <div class="box-body">

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'id_jenis')->label('Jenis Buku')->widget(Select2::classname(), [
    // 
    'data' => Jenis::getList(),
    'options' => ['placeholder' => 'Pilih Jenis Buku',
    
    ]
]); ?>

	<?= $form->field($model, 'id_penulis')->label('Nama Penulis')->widget(Select2::classname(), [
    // 
    'data' => Penulis::getList(),
    'options' => ['placeholder' => 'Pilih Penulis Buku',

    ]
]); ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
    <div class="col-sm-offset-2 col-sm-3">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </div>
    </div>

</div>

    <?php ActiveForm::end(); ?>