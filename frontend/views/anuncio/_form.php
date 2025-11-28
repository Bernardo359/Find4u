<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Categoria;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioForm $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-form container mt-4">
    <div class="card shadow-sm p-4">
        <h4 class="card-title mb-4"><?= $model->id ? 'Editar Anúncio' : 'Criar Anúncio' ?></h4>

        <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <!-- Upload de Fotos -->
        <div class="row mb-3">
            <div class="col-md-12">

                <?= $form->field($model, 'imageFiles[]')->fileInput([
                    'multiple' => true,
                    'accept'   => 'image/*',
                    'id'       => 'image-upload'
                ])->label('Fotos do Imóvel') ?>

                <div id="preview-images" class="d-flex flex-wrap mt-2"></div>
            </div>
        </div>

        <!-- Título e Descrição -->
        <div class="row mb-3">
            <div class="col-md-6">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Título do anúncio']) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'descricao')->textInput(['maxlength' => true, 'placeholder' => 'Descrição do imóvel']) ?>
            </div>
        </div>

        <!-- Preço, Tipologia e Área -->
        <div class="row mb-3">
            <div class="col-md-4">
                <?= $form->field($model, 'preco')->input('number', ['placeholder' => '€'])->label('Preço') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'tipologia')->textInput(['maxlength' => true, 'placeholder' => 'Tipologia']) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'area')->input('number', ['placeholder' => 'm²'])->label('Área') ?>
            </div>
        </div>

        <!-- Categoria -->
        <div class="row mb-3">
            <div class="col-md-6">
                <?= $form->field($model, 'categoriaid')->dropDownList(
                    ArrayHelper::map(Categoria::find()->all(), 'id', 'nome'),
                    ['prompt' => 'Selecione uma categoria']
                ) ?>
            </div>
        </div>

        <!-- Localização -->
        <div class="row mb-3">
            <div class="col-md-3"><?= $form->field($model, 'distrito')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-3"><?= $form->field($model, 'concelho')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-3"><?= $form->field($model, 'freguesia')->textInput(['maxlength' => true]) ?></div>
            <div class="col-md-3"><?= $form->field($model, 'moradacompleta')->textInput(['maxlength' => true, 'placeholder' => 'Rua, nº, etc.']) ?></div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2"><?= $form->field($model, 'porta')->textInput() ?></div>
            <div class="col-md-2"><?= $form->field($model, 'escolas')->textInput() ?></div>
            <div class="col-md-2"><?= $form->field($model, 'transportes')->textInput() ?></div>
            <div class="col-md-2"><?= $form->field($model, 'supermercados')->textInput() ?></div>
        </div>

        <!-- Características Adicionais -->
        <div class="row mb-3">
            <div class="col-md-12">
                <?= $form->field($model, 'caracteristicasadicionais')->textarea(['rows' => 3, 'placeholder' => 'Características adicionais']) ?>
            </div>
        </div>

        <div class="text-center mt-4">
            <?= Html::submitButton($model->id ? 'Guardar Alterações' : 'Criar Anúncio', ['class' => 'btn btn-success btn-lg']) ?>
            <?= Html::a('⬅ Voltar', ['index'], ['class' => 'btn btn-secondary btn-lg ms-2']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>