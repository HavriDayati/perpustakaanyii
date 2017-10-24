<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KriteriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kriteria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'ipk') ?>

    <?= $form->field($model, 'penghasilan_ortu') ?>

    <?= $form->field($model, 'jml_tanggungan') ?>

    <?php // echo $form->field($model, 'id_semester') ?>

    <?php // echo $form->field($model, 'usia') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
