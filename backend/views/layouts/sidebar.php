<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="logo_sidebar">
        <img src="<?= Yii::getAlias('@web/img/logo.jpeg') ?>" alt="Find4u logo" style=" width: 100%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> 

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Home Page',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                    ],
                    [
                        'label' => 'Anúncios',
                        'icon' => 'fas fa-home',
                        'badge' => '<span class="right badge badge-info">2</span>',
                    ],
                    [
                        'label' => 'Denuncias',
                        'icon' => 'fas fa-exclamation-triangle',
                        'badge' => '<span class="right badge badge-info">2</span>',
                    ],  
                    [
                        'label' => 'Utilizadores',
                        'icon' => 'fas fa-users',
                        'badge' => '<span class="right badge badge-danger">New</span>',
                    ],
                    [
                        'label' => 'Localizações',
                        'icon' => 'fas fa-solid fa-map',
                        'badge' => '<span class="right badge badge-danger">New</span>',
                    ],  
                      
                    
                    
                   
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'CRUD Tabelas', 'header' => true],
                    [
                        'label' => 'User Profile',
                        'icon' => 'fas fa-users',
                        'url' => ['/userprofile/index'],
                    ],
                    [
                        'label' => 'Anuncio',
                        'icon' => 'fas fa-home',
                        'url' => ['/anuncio/index'],
                    ],
                    [
                        'label' => 'Categoria',
                        'icon' => 'fas fa-list',
                        'url' => ['/categoria/index'],
                    ],
                    [
                        'label' => 'comentario',
                        'icon' => 'fas fa-comment',
                        'url' => ['/comentario/index'],
                    ],
                    [
                        'label' => 'Denuncia',
                        'icon' => 'fas fa-exclamation',
                        'url' => ['/denuncia/index'],
                    ],
                    [
                        'label' => 'Estado Anuncio',
                        'icon' => 'fas fa-chart-pie',
                        'url' => ['/estadoanuncio/index'],
                    ],
                    [
                        'label' => 'Favoritos',
                        'icon' => 'fas fa-heart',
                        'url' => ['/favorito/index'],
                    ],
                    [
                        'label' => 'Review',
                        'icon' => 'fas fa-star',
                        'url' => ['/review/index'],
                    ],
                    [
                        'label' => 'Stats',
                        'icon' => 'fas fa-chart-bar',
                        'url' => ['/stats/index'],
                    ],
                    [
                        'label' => 'Visita',
                        'icon' => 'fas fa-calendar',
                        'url' => ['/visita/index'],
                    ],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>