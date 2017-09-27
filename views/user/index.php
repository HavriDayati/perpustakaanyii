<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">

    <div class="box-header">
        <?= Html::a('<i class ="glyphicon glyphicon-plus"></i> Tambah User', ['create'], ['class' => 'btn btn-primary']) ?>
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
            'username',
            'password',
            'role',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
