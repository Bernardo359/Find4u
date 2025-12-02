<?php
use yii\helpers\Url;

/** @var $anuncios common\models\Anuncio[] */
?>

<div class="section properties">
    <div class="container">

        <ul class="properties-filter">
            <li><a class="is_active" href="#!" data-filter="*">Mostrar todas</a></li>
            <li><a href="#!" data-filter=".adv">Apartmento</a></li>
            <li><a href="#!" data-filter=".str">Moradia</a></li>
            <li><a href="#!" data-filter=".rac">Arrendar</a></li>
        </ul>

        <div class="row properties-box">

            <?php foreach ($anuncios as $anuncio): ?>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items adv">
                    <a href="<?= Url::to(['catalogo/detalhes', 'id' => $anuncio->id]) ?>">
                        <div class="item">

                            <?php
                            // Foto (se existir)
                            $foto = $anuncio->fotos[0]->caminho ?? '../../web/template/img/property-01.jpg';
                            ?>
                            <img src="<?= $foto ?>" alt="imagem do anúncio">

                            <span class="category"><?= $anuncio->categoria->nome ?? 'Categoria' ?></span>
                            <h6><?= number_format($anuncio->preco, 2) ?>€</h6>
                            <h4><?= $anuncio->titulo ?></h4>

                            <ul>
                                <li>Tipologia: <span><?= $anuncio->tipologia ?></span></li>
                                <li>Área: <span><?= $anuncio->area ?> m2</span></li>
                                <li>Localização: <span><?= $anuncio->localizacao->nome ?? 'N/D' ?></span></li>
                            </ul>

                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
