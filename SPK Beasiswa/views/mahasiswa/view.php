<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mahasiswa */

$this->title = "Detail Mahasiswa";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mahasiswa'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mahasiswa-view box box-primary">

    <div class="box-header">
        <h3 class="box-title">Detail Mahasiswa</h3>
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
                'attribute' => 'email',
                'format' => 'raw',
                'value' => $model->email,
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
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Mahasiswa', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="fa fa-list"></i> Daftar Mahasiswa', ['index'], ['class' => 'btn btn-warning btn-flat']) ?>
    </div>

</div>
