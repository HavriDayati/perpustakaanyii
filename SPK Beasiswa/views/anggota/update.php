<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = "Sunting Anggota";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anggotas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="anggota-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
