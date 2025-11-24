<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AnuncioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="anuncio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'preco') ?>

    <?= $form->field($model, 'tipologia') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'caracteristicasadicionais') ?>

    <?php // echo $form->field($model, 'datapublicacao') ?>

    <?php // echo $form->field($model, 'dataexpiracao') ?>

    <?php // echo $form->field($model, 'userprofileid') ?>

    <?php // echo $form->field($model, 'categoriaid') ?>

    <?php // echo $form->field($model, 'localizacaoid') ?>

    <?php // echo $form->field($model, 'estadoanuncioid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
