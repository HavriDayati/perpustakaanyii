<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKelamin */

$this->title = "Sunting Jenis Kelamin";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Kelamins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="jenis-kelamin-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
