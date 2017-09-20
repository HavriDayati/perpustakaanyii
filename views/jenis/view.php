<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $model app\models\Jenis */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jenis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-view">

    <h1>Detail Jenis Buku</h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting Jenis', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Jenis', ['jenis/index', 'id' => $model->id], [ 'class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'nama',
        ],
    ]) ?>

</div>

<table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Penulis</th>
        <th>Cover</th>
    </tr>
    </thead>
    <tr>
        <?php
        $i=1;
        // menampilkan buku yang dimana id_jenis nya sama dengan id dari yang di view
        foreach (Buku::find()->where(['id_jenis' => $model->id])->all() as $data) { ?>
        <td><?= $i; ?></td>
        <td><?= $data->nama ?></td>
        <td><?= $data->idJenis->nama ?></td>
        <td><?= $data->idPenulis->nama ?></td>
        <td><?= $data->cover ?></td>
    </tr>
    <?php $i++; } ?>
</table>

