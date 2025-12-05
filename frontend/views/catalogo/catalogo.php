<?php
use yii\helpers\Url;

/** @var $anuncios common\models\Anuncio[] */
?>

<div class="catalogo-section">
    <div class="catalogo-container">
        
        <!-- Header -->
        <div class="catalogo-header">
            <h1>Encontre o Imóvel Perfeito</h1>
            <p>Explore nossa seleção de propriedades de qualidade</p>
        </div>

        <!-- Filtros -->
        <div class="catalogo-filters">
            <ul class="filters-list">
                <li><a class="filter-btn is_active" href="#!" data-filter="*">Todas</a></li>
                <li><a class="filter-btn" href="#!" data-filter=".adv">Apartamento</a></li>
                <li><a class="filter-btn" href="#!" data-filter=".str">Moradia</a></li>
                <li><a class="filter-btn" href="#!" data-filter=".rac">Arrendar</a></li>
            </ul>
        </div>

        <!-- Grid de Propriedades -->
        <div class="properties-grid">
            <?php foreach ($anuncios as $anuncio): ?>
                <div class="property-card adv">
                    <button class="btn-favorito">
                        <i class="far fa-heart"></i>
                    </button>
                    <a href="<?= Url::to(['catalogo/detalhes', 'id' => $anuncio->id]) ?>" class="card-link">
                        
                        <!-- Imagem -->
                        <div class="card-image">
                            <?php
                            $defaultImg = Yii::getAlias('@web') . '/template/img/property-01.jpg';
                            $foto = $defaultImg;

                            if (!empty($anuncio->fotos) && isset($anuncio->fotos[0]) && !empty($anuncio->fotos[0]->nomefoto)) {
                                $f = $anuncio->fotos[0];
                                $foto = Yii::getAlias('@web') . '/uploads/' . $f->nomefoto;
                            }
                            ?>
                            <img src="<?= $foto ?>" alt="<?= $anuncio->titulo ?>">
                            
                            <div class="card-overlay">
                                <span class="view-btn">Ver Detalhes</span>
                            </div>
                        </div>

                        <!-- Badge Categoria -->
                        <span class="card-badge"><?= $anuncio->categoria->nome ?? 'Categoria' ?></span>

                        <!-- Conteúdo -->
                        <div class="card-content">
                            <h3 class="card-title"><?= $anuncio->titulo ?></h3>
                            
                            <div class="card-price">
                                <span><?= number_format($anuncio->preco, 2) ?></span>€
                            </div>

                            <div class="card-details">
                                <div class="detail-item">
                                    <i class="fas fa-home"></i>
                                    <span><?= $anuncio->tipologia ?></span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-ruler-combined"></i>
                                    <span><?= $anuncio->area ?> m²</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?= $anuncio->localizacao->distrito ?? 'N/D' ?></span>
                                </div>
                            </div>
                        </div>

                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>