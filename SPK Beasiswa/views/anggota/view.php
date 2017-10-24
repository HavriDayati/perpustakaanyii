<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = "Detail Anggota";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Anggota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Anggota</h3>
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
                'attribute' => 'alamat',
                'format' => 'raw',
                'value' => $model->alamat,
            ],

            [
                'attribute' => 'id_jenis_kelamin',
                'value' => function($data){
                    return $data->idJenisKelamin->nama;
                },
            ],
            [
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email,
            ],
            [
                'attribute' => 'tgl_lhr',
                'format' => 'raw',
                'value' => $model->tgl_lhr,
            ],
            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => Html::img('@web/uploads/'.$model->photo,['width'=>'100px']),
            ],

        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Anggota', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Anggota', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
