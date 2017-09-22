<?php


use app\models\Buku;
use app\models\Penerbit;
use app\models\Penulis;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = "Halaman Dashboard";
?>
  <div class="site-index">


        <div class="body-content">

<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <p>Jumlah Buku</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            <h3><?= Buku::getCount(); ?></h3>
            <span style="font-size: 30px"></span>
            <a href="<?= Url::to(['buku/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Jumlah Penerbit</p>
            </div>
            <div class="icon">
                <i class="fa fa-bookmark"></i>
            </div>
            <h3><?= Penerbit::getCount(); ?></h3>
            <a href="<?= Url::to(['penerbit/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <p>Jumlah Penulis</p>
            </div>
            <div class="icon">
                <i class="fa fa-tags"></i>
            </div>
            <h3><?= Penulis::getCount(); ?></h3>
            <a href="<?= Url::to(['penulis/index']); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>       
        </div>
        
</div>

    <div class="row">
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Penulis</h3>
            </div>
            <div class="box-body">
                <?= $this->render('grafikpenulis'); ?>
            </div>
        </div>
    </div>
<div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Grafik Peminjaman</h3>
            </div>
            <div class="box-body">
                <?= $this->render('grafikpeminjaman'); ?>
            </div>
        </div>
    </div>
