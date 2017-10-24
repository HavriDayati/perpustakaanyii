<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jurusan */

$this->title = "Sunting Jurusan";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jurusans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="jurusan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
