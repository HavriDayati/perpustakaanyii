<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PenerimaBeasiswa */

$this->title = "Tambah Penerima Beasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penerima Beasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerima-beasiswa-create">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
