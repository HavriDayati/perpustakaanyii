<?php
    use app\models\PelayananStatus;
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web').'/images/POLINDRA.png'; ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username; ?></p>

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
                    ['label' => 'Dashboard', 'icon' => 'home', 'url' => ['site/index'],],
                    ['label' => 'MENU BUKU', 'options' => ['class' => 'header']],

                        ['label' => 'Buku', 'icon' => 'book', 'url' => ['buku/index'],],
                            ['label' => 'Jenis Buku', 'icon' => 'list-alt', 'url' => ['jenis/index'],],
                            ['label' => 'Penerbit', 'icon' => 'bookmark', 'url' => ['penerbit/index'],],
                            ['label' => 'Penulis', 'icon' => 'tags', 'url' => ['penulis/index'],],

                    ['label' => 'MENU LAINNYA', 'options' => ['class' => 'header']],
                    ['label' => 'Peminjaman', 'icon' => 'tasks', 'url' => ['peminjaman/index']],
                    ['label' => 'Admin', 'icon' => 'user', 'url' => ['pengguna/index']],
                    ['label' => 'Logout', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>' , 'visible' => !Yii::$app->user->isGuest],
                ],
            ]
        ) ?>
    </section>

</aside>
