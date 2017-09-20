<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenulisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penulis Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penulis-index box box-primary">
    
<div class="box-header">
        <?= Html::a('<i class ="glyphicon glyphicon-plus"></i> Tambah Penulis', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header' => 'No',
            ],

          
            'nama',
            [

            'attribute' => 'id_jenis_kelamin',
                'value' => function($data){
                    return $data->idJenisKelamin->nama;
                },
            ],
            'alamat:ntext',
            'lat',
            // 'lon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
