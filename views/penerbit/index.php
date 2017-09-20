<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerbitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerbit Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index box box-primary">

<div class="box-header">
        <?= Html::a('<i class ="glyphicon glyphicon-plus"></i> Tambah Penerbit', ['create'], ['class' => 'btn btn-primary']) ?>
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
            'alamat_penerbit:ntext',
            'latitude',
            'longitude',
            // 'tahun_terbit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
