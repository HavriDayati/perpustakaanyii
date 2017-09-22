<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index box box primary">

    <div class="box-header">
        <?= Html::a('<i class ="glyphicon glyphicon-plus"></i> Tambah Buku', ['create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel Buku', Yii::$app->request->url.'&export=1', ['class' => 'btn btn-success btn-flat']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-search"></i> Cari Buku', ['cari'], ['class' => 'btn btn-success btn-flat']) ?>

        </div>

        <div class="box-body">
        <?php
        ?>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
            ],

            'nama',
            [
                'attribute' => 'id_jenis',
                'value' => function($data){
                    return $data->getRelationField('idJenis', 'nama');
                },
            ],

            [
                'attribute' => 'id_penulis',
                'value' => function($data){
                    // $data = variable, ->namaRelasi-namaField
                    return $data->idPenulis->nama;
                },
            ],
            
            'cover',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
