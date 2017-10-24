<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Semester */

$this->title = "Sunting Semester";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semesters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Sunting');
?>
<div class="semester-update">

    <?= $this->render('_form', [
        'model' => $model,
        'referrer'=> $referrer
    ]) ?>

</div>
