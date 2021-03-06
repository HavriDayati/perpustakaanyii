<?php
    use app\models\PelayananStatus;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/images/POLINDRA.png'; ?>" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= ucwords(Yii::$app->user->identity->username) ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> 
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['admin/index']],
                    ['label' => 'Anggota', 'icon' => 'home', 'url' => ['anggota/index']],
                    ['label' => 'Detail Mahasiswa', 'icon' => 'book', 'url' => ['detail-mahasiswa/index']],
                    ['label' => 'Jenis Kelamin', 'icon' => 'book', 'url' => ['jenis-kelamin/index']],
                    ['label' => 'Jurusan', 'icon' => 'book', 'url' => ['jurusan/index']],
                    ['label' => 'Semester', 'icon' => 'book', 'url' => ['semester/index']],
                    ['label' => 'Kriteria', 'icon' => 'book', 'url' => ['kriteria/index']],
                    ['label' => 'Mahasiswa', 'icon' => 'book', 'url' => ['mahasiswa/index']],
                    ['label' => 'Penerima Beasiswa', 'icon' => 'book', 'url' => ['penerima-beasiswa/index']],
                    ['label' => 'User', 'icon' => 'user', 'url' => ['/user'],],
                    ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
