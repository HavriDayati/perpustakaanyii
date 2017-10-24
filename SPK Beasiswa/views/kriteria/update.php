<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = "Sunting Kriteria";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kriterias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="kriteria-update">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
