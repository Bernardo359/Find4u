<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Categoria;
use common\models\Localizacao;
use common\models\Estadoanuncio;
use common\models\Anuncio;

/** @var yii\web\View $this */
/** @var common\models\Anuncio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-form container mt-4">
    <div class="card shadow-sm p-4">
        <h4 class="card-title mb-4"><?= $model->isNewRecord ? 'Criar Anúncio' : 'Editar Anúncio' ?></h4>

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'preco')->input('number') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'tipologia')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'area')->input('number') ?>
            </div>
        </div>

        <?= $form->field($model, 'caracteristicasadicionais')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'categoriaid')->dropDownList(
                    ArrayHelper::map(Categoria::find()->all(), 'id', 'nome'),
                    ['prompt' => 'Selecione uma categoria']
                ) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'localizacaoid')->dropDownList(
                    ArrayHelper::map(Localizacao::find()->all(), 'id', function($loc){
                        return $loc->distrito . ' - ' . $loc->concelho;
                    }),
                    ['prompt' => 'Selecione localização']
                ) ?>
            </div>
        </div>

        <!-- Estado controlado -->
        <?php if (!$model->isNewRecord): ?>
            <?php
            if ($model->estadoanuncioid == Anuncio::ESTADO_ATIVO) {
                echo $form->field($model, 'estadoanuncioid')->dropDownList(
                    [Anuncio::ESTADO_ATIVO => 'Ativo', Anuncio::ESTADO_DESATIVADO => 'Desativado'],
                    ['prompt' => 'Selecione o estado']
                );
            } else {
                echo $form->field($model, 'estadoanuncioid')->textInput([
                    'readonly' => true,
                    'value' => $model->estadoanuncioid == Anuncio::ESTADO_EXPIRADO ? 'Expirado' : 'Desativado'
                ]);
            }
            ?>
        <?php else: ?>
            <?= $form->field($model, 'estadoanuncioid')->hiddenInput(['value' => Anuncio::ESTADO_ATIVO])->label(false) ?>
        <?php endif; ?>

        <?= $form->field($model, 'userprofileid')->hiddenInput()->label(false) ?>

        <div class="text-center mt-4">
            <?= Html::submitButton($model->isNewRecord ? 'Criar Anúncio' : 'Guardar Alterações', ['class' => 'btn btn-success btn-lg']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
