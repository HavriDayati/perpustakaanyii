<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penerbit */

$this->title = "Detail Penerbit";
$this->params['breadcrumbs'][] = ['label' => 'Penerbit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-view box box-primary">
    <div class="box-header">
        <h3 class="box-title">Detail Penerbit</h3>
    </div>

    <div class="box-body">
        <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="180px" style="text-align:right">{label}</th><td>{value}</td></tr>',
        'attributes' => [

            'nama',
            'tahun_terbit',
            'alamat_penerbit:ntext',
            
        ],
    ]) ?>

    </div>

    <div class="box-footer">
        <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Sunting', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-list"></i> Daftar Penerbit', ['penerbit/index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </div>

    
</div>