<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenerimaBeasiswa */

$this->title = "Sunting Penerima Beasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penerima Beasiswas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="penerima-beasiswa-update">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
