<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Peminjaman;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title ="Detail User";
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">
    <div class="box-header">
        <h3 class="box-title">Detail User</h3>
    </div>

    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'nama',
            'username',
            'password',
            'role',
            'authKey',
            'accessToken',
        ],
    ]) ?>

    </div>
        <div class="box-footer">
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar User', ['user/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </div>

    <table class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Buku</th>
        <th>Nama user</th>
        <th>Waktu Dipinjam</th>
        <th>Waktu Pengembalian</th>
    </tr>
    </thead>
    <tr>
        <?php
        $i=1;
        // menampilkan buku yang dimana id_jenis nya sama dengan id dari yang di view
        foreach (Peminjaman::find()->where(['id_user' => $model->id])->all() as $data) { ?>
        <td><?= $i; ?></td>
        <td><?= $data->idBuku->nama ?></td>
        <td><?= $data->idUser->nama ?></td>
        <td><?= $data->waktu_dipinjam ?></td>
        <td><?= $data->waktu_pengembalian ?></td>
    </tr>
    <?php $i++; } ?>
</table>

</div>
