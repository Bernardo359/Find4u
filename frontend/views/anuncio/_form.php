<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Categoria;
use common\models\Estadoanuncio;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-form-container">

    <?php $form = ActiveForm::begin([
        'id' => 'anuncio-form',
        'options' => [
            'class' => 'anuncio-form',
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <!-- Seção: Upload de Fotos -->
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-image"></i> Fotos do Imóvel
        </h3>
        
        <div class="file-upload-area">
            <?= $form->field($model, 'imageFiles[]')->fileInput([
                'multiple' => true,
                'accept' => 'image/*',
                'id' => 'image-upload',
                'class' => 'file-input'
            ])->label(false) ?>
            
            <div class="file-upload-label">
                <i class="fas fa-cloud-upload-alt"></i>
                <p>Clique ou arraste as fotos aqui</p>
                <span>PNG, JPG, GIF até 2MB</span>
            </div>
        </div>

        <div id="preview-images" class="preview-images-grid"></div>
    </div>

    <!-- Seção: Informações Básicas -->
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-info-circle"></i> Informações Básicas
        </h3>
        
        <div class="form-row">
            <div class="form-group form-col-full">
                <?= $form->field($model, 'titulo')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Ex: Apartamento T2 em Lisboa',
                    'maxlength' => true
                ])->label('Título do Anúncio') ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group form-col-full">
                <?= $form->field($model, 'descricao')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Descrição breve do imóvel',
                    'maxlength' => true
                ])->label('Descrição') ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group form-col-3">
                <?= $form->field($model, 'preco')->input('number', [
                    'class' => 'form-control-custom',
                    'placeholder' => '0.00',
                    'step' => '0.01'
                ])->label('Preço (€)') ?>
            </div>

            <div class="form-group form-col-3">
                <?= $form->field($model, 'tipologia')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Ex: T2, T3',
                    'maxlength' => true
                ])->label('Tipologia') ?>
            </div>

            <div class="form-group form-col-3">
                <?= $form->field($model, 'area')->input('number', [
                    'class' => 'form-control-custom',
                    'placeholder' => '0',
                    'step' => '0.01'
                ])->label('Área (m²)') ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group form-col-full">
                <?= $form->field($model, 'categoriaid')->dropDownList(
                    ArrayHelper::map(Categoria::find()->all(), 'id', 'nome'),
                    [
                        'class' => 'form-control-custom',
                        'prompt' => '-- Selecione uma categoria --'
                    ]
                )->label('Categoria') ?>
            </div>
        </div>
    </div>

    <!-- Seção: Localização -->
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-map-marker-alt"></i> Localização
        </h3>
        
        <div class="form-row">
            <div class="form-group form-col-3">
                <?= $form->field($model, 'distrito')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Ex: Lisboa',
                    'maxlength' => true
                ])->label('Distrito') ?>
            </div>

            <div class="form-group form-col-3">
                <?= $form->field($model, 'concelho')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Ex: Lisboa',
                    'maxlength' => true
                ])->label('Concelho') ?>
            </div>

            <div class="form-group form-col-3">
                <?= $form->field($model, 'freguesia')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Ex: São Sebastião',
                    'maxlength' => true
                ])->label('Freguesia') ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group form-col-2">
                <?= $form->field($model, 'moradacompleta')->textInput([
                    'class' => 'form-control-custom',
                    'placeholder' => 'Rua, Avenida, etc',
                    'maxlength' => true
                ])->label('Morada Completa') ?>
            </div>

            <div class="form-group form-col-1">
                <?= $form->field($model, 'porta')->textInput([
                    'class' => 'form-control-custom',
                    'type' => 'number',
                    'placeholder' => '0'
                ])->label('Porta') ?>
            </div>
        </div>
    </div>

    <!-- Seção: Comodidades Próximas -->
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-star"></i> Comodidades Próximas
        </h3>
        
        <div class="checkbox-group">
            <div class="checkbox-wrapper">
                <?= $form->field($model, 'transportes')->checkbox([
                    'label' => 'Transportes Públicos',
                    'labelOptions' => ['class' => 'checkbox-label'],
                    'value' => 1,
                    'uncheckValue' => 0
                ])->label(false) ?>
            </div>

            <div class="checkbox-wrapper">
                <?= $form->field($model, 'escolas')->checkbox([
                    'label' => 'Escolas',
                    'labelOptions' => ['class' => 'checkbox-label'],
                    'value' => 1,
                    'uncheckValue' => 0
                ])->label(false) ?>
            </div>

            <div class="checkbox-wrapper">
                <?= $form->field($model, 'supermercados')->checkbox([
                    'label' => 'Supermercados',
                    'labelOptions' => ['class' => 'checkbox-label'],
                    'value' => 1,
                    'uncheckValue' => 0
                ])->label(false) ?>
            </div>
        </div>
    </div>

    <!-- Seção: Características Adicionais -->
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-list"></i> Características Adicionais
        </h3>
        
        <div class="form-row">
            <div class="form-group form-col-full">
                <?= $form->field($model, 'caracteristicasadicionais')->textarea([
                    'class' => 'form-control-custom form-textarea',
                    'rows' => 4,
                    'placeholder' => 'Descreva características adicionais do imóvel...'
                ])->label('Características') ?>
            </div>
        </div>
    </div>

    <!-- Seção: Estado do Anúncio (Apenas para editar) -->
    <?php if (!empty($model->id)): ?>
    <div class="form-section">
        <h3 class="form-section-title">
            <i class="fas fa-cogs"></i> Configurações
        </h3>
        
        <div class="form-row">
            <div class="form-group form-col-full">
                <?= $form->field($model, 'estadoanuncioid')->dropDownList(
                    ArrayHelper::map(Estadoanuncio::find()->all(), 'id', 'estado'),
                    [
                        'class' => 'form-control-custom',
                        'prompt' => '-- Selecione um estado --'
                    ]
                )->label('Estado do Anúncio') ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Botões -->
    <div class="form-actions">
        <?= Html::submitButton(
            empty($model->id) ? '<i class="fas fa-plus"></i> Criar Anúncio' : '<i class="fas fa-save"></i> Guardar Alterações',
            ['class' => 'btn-submit']
        ) ?>
        
        <?= Html::a(
            '<i class="fas fa-arrow-left"></i> Voltar',
            ['index'],
            ['class' => 'btn-cancel']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>