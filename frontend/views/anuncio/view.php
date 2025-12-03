<?php

use yii\helpers\Html;

$this->title = $model->titulo;
?>
<div class="anuncio-view-container">

    <!-- Header com Titulo e Ações -->
    <div class="anuncio-header">
        <div class="anuncio-title-section">
            <h1 class="anuncio-main-title"><?= Html::encode($this->title) ?></h1>
            <p class="anuncio-id">Anúncio ID: <?= $model->id ?></p>
        </div>

        <div class="anuncio-actions">
            <?= Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-update-custom',
                'title' => 'Editar',
                'data-toggle' => 'tooltip'
            ]) ?>

            <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-delete-custom',
                'title' => 'Apagar',
                'data' => ['confirm' => 'Tem a certeza?', 'method' => 'post'],
                'data-toggle' => 'tooltip'
            ]) ?>
        </div>
    </div>

    <!-- Informações Principais (2 Colunas) -->
    <div class="anuncio-grid-principal">
        
        <div class="anuncio-card">
            <h6 class="anuncio-label">Título</h6>
            <p class="anuncio-value"><?= $model->titulo ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Preço</h6>
            <p class="anuncio-value anuncio-price"><?= Yii::$app->formatter->asCurrency($model->preco, 'EUR') ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Localização</h6>
            <p class="anuncio-value"><?= $fullocalizacao ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Estado</h6>
            <p class="anuncio-value">
                <span class="anuncio-badge"><?= $model->estadoanuncio->estado ?></span>
            </p>
        </div>
    </div>

    <!-- Grid de Detalhes (4 Colunas) -->
    <div class="anuncio-grid-detalhes">
        
        <div class="anuncio-card">
            <h6 class="anuncio-label">Tipologia</h6>
            <p class="anuncio-value"><?= $model->tipologia ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Área</h6>
            <p class="anuncio-value"><?= $model->area ?> m²</p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Categoria</h6>
            <p class="anuncio-value"><?= $model->categoria->nome ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Publicado</h6>
            <p class="anuncio-value"><?= Yii::$app->formatter->asDate($model->datapublicacao, 'php:d/m/Y') ?></p>
        </div>

        <div class="anuncio-card">
            <h6 class="anuncio-label">Expira em</h6>
            <p class="anuncio-value"><?= Yii::$app->formatter->asDate($model->dataexpiracao, 'php:d/m/Y') ?></p>
        </div>
    </div>

    <!-- Características Adicionais (Full Width) -->
    <?php if (!empty($model->caracteristicasadicionais)): ?>
    <div class="anuncio-caracteristicas">
        <h6 class="anuncio-label">Características Adicionais</h6>
        <div class="anuncio-card anuncio-card-full">
            <p class="anuncio-caracteristicas-text"><?= nl2br(Html::encode($model->caracteristicasadicionais)) ?></p>
        </div>
    </div>
    <?php endif; ?>

</div>