<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\BackofficeAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

BackofficeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="<?= Yii::$app->request->baseUrl ?>/templateBack/css/backoffice.css">
    <script src="<?= Yii::$app->request->baseUrl ?>/templateBack/js/backoffice.js"></script> -->
    
    <?php $this->head() ?>
</head>

<body class="backoffice-body">
<?php $this->beginBody() ?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <a href="<?= \yii\helpers\Url::to(['backoffice/index']) ?>">
                <img src="<?= Url::to('@web/templateBack/img/Logo_find4u2.png') ?>" alt="Find4U">
            </a>
        </div>
    </div>
    
    <div class="user-profile">
        <div class="user-info">
            <div class="avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-details">
                <h3><?= Yii::$app->user->identity->username ?></h3>
                <p>Anunciante Premium</p>
            </div>
        </div>
        <?= Html::a('<i class="fas fa-plus"></i> <span>Novo Anúncio</span>', ['anuncio/create'], ['class' => 'new-listing-btn']) ?>
    </div>

    <div class="menu">
        <div class="menu-section">
            <div class="menu-label">Gestão</div>
            <?= Html::a('<i class="fas fa-users"></i>Os Meus Imóveis', ['anuncio/index'], [
                'class' => 'menu-item'
            ]) ?>
            <?= Html::a('<i class="fas fa-chart-line"></i>Dashboard', ['backoffice/index'], [
                'class' => 'menu-item'
            ]) ?>
            <?= Html::a('<i class="fas fa-chart-line"></i>Estatísticas', ['backoffice/estatisticas'], [
                'class' => 'menu-item'
            ]) ?>
            <?= Html::a('<i class="fas fa-chart-line"></i>Leads', ['backoffice/leads'], [
                'class' => 'menu-item'
            ]) ?>
            <?= Html::a('<i class="fas fa-calendar-alt"></i>Agendamentos<span class="badge">2</span>', ['backoffice/agendamentos'], [
                'class' => 'menu-item'
            ]) ?>
            <?= Html::a('<i class="fas fa-comments"></i>Mensagens<span class="badge">5</span>', ['backoffice/mensagens'], [
                'class' => 'menu-item'
            ]) ?>
        </div>
    </div>

    <div class="sidebar-footer">
        <?= Html::beginForm(['/site/index']) ?>
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair do BackOffice</span>
            </button>
        <?= Html::endForm() ?>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <?= Alert::widget() ?>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>