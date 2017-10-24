<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Kriteria */

$this->title = "Detail Kriteria";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kriteria'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Kriteria</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
        
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'ipk',
                'format' => 'raw',
                'value' => $model->ipk,
            ],
            [
                'attribute' => 'penghasilan_ortu',
                'format' => 'raw',
                'value' => $model->penghasilan_ortu,
            ],
            [
                'attribute' => 'jml_tanggungan',
                'format' => 'raw',
                'value' => $model->jml_tanggungan,
            ],
            [
                'attribute' => 'id_semester',
                'format' => 'raw',
                'value' => $model->id_semester,
            ],
            [
                'attribute' => 'usia',
                'format' => 'raw',
                'value' => $model->usia,
            ],
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kriteria', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Kriteria', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
