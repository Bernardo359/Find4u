<?php

/** @var yii\web\View $this */

$this->title = 'Detalhes Imóvel';
?>

<div class="page-heading header-text">
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
                  Best useful links ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How does this work ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Why is Villa the best ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor kinfolk tonx seitan crucifix 3 wolf moon bicycle rights keffiyeh snackwave wolf same vice, chillwave vexillologist incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="info-table">
            <ul>
              <li>
                <img src="../../web/template/img/info-icon-01.png" alt="" style="max-width: 52px;">
                <h4><?= $anuncio->area  ?> m<sup>2</sup><br><span>Area em m<sup>2</sup></span></h4>
              </li>
              <li>
                <img src="../../web/template/img/info-icon-02.png" alt="" style="max-width: 52px;">
                <h4><?= $anuncio->tipologia ?><br><span>Tipologia</span></h4>
              </li>
              <li>
                <img src="../../web/template/img/info-icon-03.png" alt="" style="max-width: 52px;">
                <h4>Payment<br><span>Payment Process</span></h4>
              </li>
              <li>
                <img src="../../web/template/img/info-icon-04.png" alt="" style="max-width: 52px;">
                <h4>Safety<br><span>24/7 Under Control</span></h4>
              </li>
            </ul>
          </div>
          <div class="main-button" style="padding-top: 40px;">
            <button class="show-modal" id="openModalBtn" type="button">Marcar Visita</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!--Modal-->
<div id="modalOverlay" class="custom-modal-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
    background: rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:9999;">

  <div class="custom-modal" style="background:white; padding:20px; border-radius:8px; width:300px; text-align:center;">
    <h2>Marcar Visita</h2>

    <label>Data & Hora:</label><br>
    <input type="datetime-local"><br><br>

    <label>Notas Adicionais:</label><br>
    <textarea name="observacoes" rows="4" cols="30" placeholder="Escreva aqui suas observações..."></textarea><br><br>

    <button class="save-btn" type="button">Agendar</button>
    <button class="close-btn" id="closeModalBtn" type="button">Fechar</button>
  </div>
</div>  



<script>
  document.addEventListener("DOMContentLoaded", function() {
    const openModalBtn = document.getElementById("openModalBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");
    const modalOverlay = document.getElementById("modalOverlay");

    console.log("JS carregado:", openModalBtn, modalOverlay);

    openModalBtn.addEventListener("click", function(e) {
      e.preventDefault(); // evita qualquer comportamento default
      modalOverlay.style.display = "flex";
      console.log("Modal aberto");
    });

    closeModalBtn.addEventListener("click", function(e) {
      e.preventDefault();
      modalOverlay.style.display = "none";
      console.log("Modal fechado");
    });

    modalOverlay.addEventListener("click", function(e) {
      if (e.target === modalOverlay) {
        modalOverlay.style.display = "none";
        console.log("Modal fechado clicando fora");
      }
    });
  });
</script>