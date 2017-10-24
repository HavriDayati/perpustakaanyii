<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Semester */

$this->title = "Tambah Semester";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semester'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semester-create">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
