<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PenerimaBeasiswa */

$this->title = "Detail Penerima Beasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Penerima Beasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerima-beasiswa-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Penerima Beasiswa</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => $model->id,
            ],
            [
                'attribute' => 'id_mhs',
                'format' => 'raw',
                'value' => $model->id_mhs,
            ],
            [
                'attribute' => 'id_semester',
                'format' => 'raw',
                'value' => $model->id_semester,
            ],
            [
                'attribute' => 'hasil',
                'format' => 'raw',
                'value' => $model->hasil,
            ],
            [
                'attribute' => 'ket',
                'format' => 'raw',
                'value' => $model->ket,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Penerima Beasiswa', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Penerima Beasiswa', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
