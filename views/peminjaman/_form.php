<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use app\models\Buku;
use app\models\User;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
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

<div class="peminjaman-form box box-primary">

    <div class="box-header with-border">
        <h3 class="box-title">Form Peminjaman</h3>
    </div>
    <div class="box-body">
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_buku')->widget(Select2::classname(), [ 
    'data' => Buku::getList(),
    'options' => ['placeholder' => 'Pilih Nama Buku',
    ]
]); ?>

    <?= $form->field($model, 'waktu_dipinjam')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'removeButton' => false, 
        'options' => ['placeholder' =>'Tanggal'],
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <?= $form->field($model, 'waktu_pengembalian')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'removeButton' => false, 
        'options' => ['placeholder' =>'Tanggal'],
            'pluginOptions' => [
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <div class="box-footer">
    <div class="col-sm-offset-2 col-sm-3">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
