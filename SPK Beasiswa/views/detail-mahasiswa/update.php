<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailMahasiswa */

$this->title = "Sunting Detail Mahasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detail Mahasiswas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="detail-mahasiswa-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
