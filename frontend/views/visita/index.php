<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\VisitaAsset;
VisitaAsset::register($this);

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\VisitaSearch $searchModel */



$this->title = 'Minhas Visitas';

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>


</head>
<body>

<div class="container">

    <header>
        <h1>Minhas Visitas</h1>
        <p>Gerencie suas visitas a imóveis de forma simples</p>
    </header>

    <!-- FILTROS (a funcionar apenas no frontend por agora) -->
    <div class="filters">
        <div class="filter-group">
            <label>Estado</label>
            <select id="filterStatus">
                <option value="">Todos os estados</option>
                <option value="confirmada">Confirmada</option>
                <option value="pendente">Pendente</option>
                <option value="alterada">Alterada</option>
                <option value="cancelada">Cancelada</option>
                <option value="rejeitada">Rejeitada</option>
            </select>
        </div>

        <div class="filter-group">
            <label>Data</label>
            <input type="date" id="filterDate">
        </div>
    </div>

    <div class="visits-list" id="visitsList">

        <?php foreach ($dataProvider->models as $visita): ?>

            <?php
            // Mapeamento das badges
            $statusClass = [
                'confirmada' => 'status-confirmada',
                'pendente'   => 'status-pendente',
                'alterada'   => 'status-alterada',
                'cancelada'  => 'status-cancelada',
                'rejeitada'  => 'status-rejeitada',
            ][$visita->estado] ?? 'status-pendente';

            // Data formatada
            $data = Yii::$app->formatter->asDate($visita->datahoraagenda, 'php:d/m/Y');
            $hora = Yii::$app->formatter->asTime($visita->datahoraagenda, 'php:H:i');

            // Nome fictício do imóvel (podes trocar pelo real)
            $imovelNome = $visita->anuncio->titulo ?? 'Imóvel';
            $localizacao = $visita->anuncio->localizacao ?? 'Localização não definida';
            $dono = $visita->anuncio->user->username ?? 'Sem anunciante';
            ?>

            <div class="visit-card"
                 data-status="<?= $visita->estado ?>"
                 data-date="<?= date('Y-m-d', strtotime($visita->datahoraagenda)) ?>"
                 data-property="<?= Html::encode($imovelNome) ?>"
            >
                <img src="<?= $visita->anuncio->foto ?? 'https://via.placeholder.com/400x300?text=Sem+Imagem' ?>"
                     class="property-image">

                <div class="visit-info">
                    <h3 class="visit-title"><?= Html::encode($imovelNome) ?></h3>
                    <div class="visit-location">📍 <?= Html::encode($localizacao) ?></div>
                    <div class="visit-datetime">📅 <?= $data ?> às <?= $hora ?></div>
                    <div class="visit-owner">👤 Anunciante: <?= Html::encode($dono) ?></div>
                    <span class="status-badge <?= $statusClass ?>">
                        <?= ucfirst($visita->estado) ?>
                    </span>
                </div>

                <div class="visit-actions">
                    <?= Html::a('Alterar Data', ['update', 'id' => $visita->id], [
                        'class' => 'btn btn-primary'
                    ]) ?>
                    
                    <?= Html::a('Ver Detalhes', ['view', 'id' => $visita->id], [
                        'class' => 'btn btn-secondary'
                    ]) ?>

                    <?= Html::a('Cancelar', ['delete', 'id' => $visita->id], [
                        'class' => 'btn btn-danger',
                        'data-confirm' => 'Tens a certeza que queres cancelar esta visita?',
                        'data-method' => 'post'
                    ]) ?>
                </div>

            </div>

        <?php endforeach; ?>

        <?php if (empty($dataProvider->models)): ?>
            <div class="empty-state">
                <h3>Não há visitas marcadas</h3>
                <p>Assim que agendar uma visita, ela aparecerá aqui 😄</p>
            </div>
        <?php endif; ?>

    </div>
</div>

</body>
</html>
