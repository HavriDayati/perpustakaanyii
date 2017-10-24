<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetailMahasiswa */

$this->title = "Detail Detail Mahasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detail Mahasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-mahasiswa-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Detail Mahasiswa</h3>
    </div>

    <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            [
                'attribute' => 'id_mhs',
                'format' => 'raw',
                'value' => $model->id_mhs,
            ],
            [
                'attribute' => 'nama',
                'format' => 'raw',
                'value' => $model->nama,
            ],
            [
                'attribute' => 'id_jurusan',
                'value' => function($data){
                    return $data->idJurusan->nama;
                },
            ],
            [
                'attribute' => 'id_jenis_kelamin',
                'value' => function($data){
                    return $data->idJenisKelamin->nama;
                },
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
                'value' => function($data){
                    return $data->idSemester->nama;
                },
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
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Detail Mahasiswa', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Detail Mahasiswa', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
