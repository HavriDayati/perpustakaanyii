<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = "Tambah Kriteria";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kriteria'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-create">

    <?= $this->render('_form', [
        'model' => $model,
       
    ]) ?>

</div>
