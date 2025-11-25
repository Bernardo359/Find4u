<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$isBackoffice = Yii::$app->controller->id === 'backoffice';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody()?>

    <?php if(!$isBackoffice): ?>

    <!-- ***** Header Area Start Comprador ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="nav-logo">
                            <img src="<?= Yii::getAlias('@web') ?>/img/Find4ULogo.png" alt="Logo">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="<?= Url::to(['/site/index']) ?>">Home</a></li>
                            <li><a href="<?= Url::to(['/catalogo/catalogo']) ?>">Imóveis</a></li>
                            <?php
                            if (Yii::$app->user->can('anunciante')){ ?>
                                <li class="btnVisit">
                                    <a href="<?= Url::to(['/backoffice/index']) ?>">
                                        <i class="fa fa-chart-line"></i> Meus Anuncios
                                    </a>
                                </li>
                            <?php } else
                                echo '<li class="btnVisit"><a href="#"><i class="fa fa-calendar"></i> Marcar Visita</a></li>';?>
                                <?php
                            if (!Yii::$app->user->isGuest){ ?>
                                <li class="btnFa">
                                    <a href="<?= Url::to(['/anuncios/favoritos']) ?>">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                            <?php } ?>
                            <div class="user-info">
                                <?php if (Yii::$app->user->isGuest): ?>
                                    <li class="btnFa">
                                        <a href="<?= \yii\helpers\Url::to(['/site/login']) ?>" class="d-flex align-items-center">
                                            <i class="fa fa-user me-1"></i> Login
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="btnFa">
                                        <a href="<?= \yii\helpers\Url::to(['/perfil/profile']) ?>" class="d-flex align-items-center text-decoration-none">
                                            <i class="fa fa-user me-1"></i>
                                            <span><?= Yii::$app->user->identity->username ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>


                            </div>

                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li class="btnFa" style="color: white; text-decoration: none;">
                                    <?= Html::beginForm(['/site/logout'], 'post', [
                                        'class' => 'm-0 p-0',
                                        'style' => 'display:inline;'
                                    ]) ?>
                                    <button type="submit"
                                        class="btn btn-link p-0 m-0"
                                        style="color: inherit; font-size: inherit; line-height: 1;">
                                        <i class="fa fa-right-to-bracket"></i>
                                    </button>
                                    <?= Html::endForm() ?>
                                </li>
                            <?php endif; ?>


                            <!--<li class="btnFa"><a href="#"><i class="fa fa-right-to-bracket"></i></a></li>-->

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <?php endif;?>
    <!-- ***** Header Area End Comprador***** -->

    <main role="main" class="flex-shrink-0">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        

    </main>

    <?php if(!$isBackoffice): ?>
    <footer class="footer mt-auto py-3 text-muted" style="background-color: black; color: white;">
        <div class="container">
            <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-end"><?= Yii::powered() ?></p>
        </div>
    </footer>
    <?php endif; ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();