<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKelamin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary jenis-kelamin-form">
    <div class="box-header with-border">
        <h3 class="box-title">Form jenis-kelamin</h3>
    </div>
    <div class="box-body">
    <?php $form = ActiveForm::begin([            
                        'layout'=>'horizontal',
                        'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label' => 'col-sm-3',
                            'wrapper' => 'col-sm-4',
                            'error' => '',
                            'hint' => '',
                    ],
                    ]]); ?>

        <?= $form->errorSummary($model); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= Html::hiddenInput('referrer',$referrer); ?>

	</div>
    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-3">
            <?= Html::submitButton('<i class="fa fa-check"></i> Simpan',['class' => 'btn btn-success btn-flat']) ?>
        </div>
    </div>

</div>

<?php ActiveForm::end(); ?>
