<?php

/** @var yii\web\View $this */

$this->title = 'Detalhes Imóvel';
?>

<div class="page-heading header-text" style="padding-top: unset;">
  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="main-image">
            <img src="../../web/template/img/single-property.jpg" alt="">
          </div>
          <div class="main-content">
            <span class="category"><?= $anuncio->categoria->nome ?></span>
            <h4><?= $anuncio->titulo ?></h4>
            <p>Descricao uniforme????</p>

          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Detalhes do Imovel
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    <li><strong>Tipologia:</strong> <?= $anuncio->tipologia ?></li>
                    <li><strong>Área:</strong> <?= $anuncio->area ?> m²</li>
                    <li><strong>Preço:</strong> <?= number_format($anuncio->preco, 2, ',', '.') ?> €</li>
                    <li><strong>Categoria:</strong> <?= $anuncio->categoria->nome ?></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Informações de Localização
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Este imóvel está localizado na região de <strong><?= $anuncio->localizacao->distrito ?></strong>, no concelho de <strong><?= $anuncio->localizacao->concelho ?></strong>, mais especificamente na freguesia de <strong><?= $anuncio->localizacao->freguesia ?></strong>.
                  A morada completa é <strong><?= $anuncio->localizacao->moradacompleta ?>, porta <?= $anuncio->localizacao->porta ?></strong>, inserida numa zona tranquila e bem estruturada.
                  <?php if (!empty($anuncio->localizacao->escolas)): ?>
                    A envolvente oferece uma excelente variedade de serviços essenciais,
                    incluindo <strong>escolas próximas</strong>, ideais para famílias que valorizam acessibilidade educacional.
                  <?php endif; ?>

                  <?php if (!empty($anuncio->localizacao->transportes)): ?>
                    A zona é bem servida por transportes públicos, com <strong><?= $anuncio->localizacao->transportes ?> paragens</strong>,
                    facilitando deslocações para diferentes áreas da cidade.
                  <?php endif; ?>

                  <?php if (!empty($anuncio->localizacao->supermercados)): ?>
                    Nas proximidades existem <strong>supermercados e comércio local</strong>,
                    garantindo acesso rápido a bens essenciais.
                  <?php endif; ?>



                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Informações do Anunciante
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <ul>
                    <li><strong>Nome:</strong> <?= $anuncio->userprofile->nome ?></li>
                    <li><strong>Telefone:</strong> <?= $anuncio->userprofile->contacto ?></li>
                    <li><strong>Localização:</strong> <?= $anuncio->userprofile->localizacao ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <i class="fa-solid fa-money-check-dollar fa-3x"></i>
                <h4><?= number_format($anuncio->preco, 2, ',', '.') ?>€<br><span>Preço</span></h4>
              </li>
              <li>
                <i class="fa-solid fa-clone fa-3x"></i>
                <h4><?= $anuncio->area  ?> m<sup>2</sup><br><span>Area em m<sup>2</sup></span></h4>
              </li>
              <li>
                <i class="fa-solid fa-house-circle-exclamation fa-3x"></i>
                <h4><?= $anuncio->tipologia ?><br><span>Tipologia</span></h4>
              </li>
              <li>
                <div class="main-button">
                  <i class="fa-solid fa-eye fa-3x"></i>
                  <h4>Tens Interesse?<br><span>Marque a sua Visita</span></h4>
                  <button class="show-modal" id="openModalBtn" type="button">Marcar Visita</button>
                </div>
              </li>
            </ul>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<!--Modal-->
<div id="modalOverlay" class="custom-modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">
  <div class="custom-modal">
    <h2>Marcar Visita</h2>
    <?php
    // Cria um novo modelo para preencher no modal
    $model = new \common\models\Visita();

    // Renderiza o form
    echo $this->render('@frontend/views/visita/_form', ['model' => $model]);
    ?>
    <button class="close-btn" id="closeModalBtn" type="button">Fechar</button>
  </div>
</div>