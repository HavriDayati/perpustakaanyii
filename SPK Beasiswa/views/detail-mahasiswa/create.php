<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailMahasiswa */

$this->title = "Tambah Detail Mahasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detail Mahasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-mahasiswa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
