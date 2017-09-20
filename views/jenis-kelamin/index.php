<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisKelaminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Kelamins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kelamin-index">

    <div class="box-header">
        <?= Html::a('<i class ="glyphicon glyphicon-plus"></i> Tambah Jenis Kelamin', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',

                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',

            ],

            'nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
