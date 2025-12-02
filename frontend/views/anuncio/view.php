<?php

use yii\helpers\Html;

$this->title = $model->titulo;
?>
<div class="anuncio-view container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-dark"><?= Html::encode($this->title) ?></h1>

        <div class="btn-group">
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


    <div class="row g-3">

        <div class="col-md-6">
            <div class="info-box-custom">
                <h6 class="info-label">Título</h6>
                <p class="info-value"><?= $model->titulo ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box-custom">
                <h6 class="info-label">Preço</h6>
                <p class="info-value"><?= Yii::$app->formatter->asCurrency($model->preco, 'EUR') ?></p>
            </div>
        </div>

        <div class="col-12">
            <div class="info-box-custom">
                <h6 class="info-label">Descrição</h6>
                <p><?= nl2br(Html::encode($model->descricao)) ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box-custom">
                <h6 class="info-label">Tipologia</h6>
                <p class="info-value"><?= $model->tipologia ?></p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box-custom">
                <h6 class="info-label">Área</h6>
                <p class="info-value"><?= $model->area ?> m²</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box-custom">
                <h6 class="info-label">Data Publicação</h6>
                <p class="info-value"><?= Yii::$app->formatter->asDate($model->datapublicacao, 'php:d/m/Y') ?></p>
            </div>
        </div>

         <div class="col-md-3">
            <div class="info-box-custom">
                <h6 class="info-label">Data Expiração</h6>
                <p class="info-value"><?= Yii::$app->formatter->asDate($model->dataexpiracao, 'php:d/m/Y') ?></p>
            </div>
        </div>

        <div class="col-12">
            <div class="info-box-custom">
                <h6 class="info-label">Características Adicionais</h6>
                <p><?= nl2br(Html::encode($model->caracteristicasadicionais)) ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box-custom">
                <h6 class="info-label">Categoria</h6>
                <p class="info-value"><?= $model->categoria->nome ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box-custom">
                <h6 class="info-label">Localização</h6>
                <p class="info-value"><?= $fullocalizacao ?></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="info-box-custom">
                <h6 class="info-label">Estado</h6>
                <p class="info-value"><?= $model->estadoanuncio->estado ?></p>
            </div>
        </div>

    </div>
</div>

<?php
$js = <<<JS
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
JS;

$this->registerJs($js);
?>
