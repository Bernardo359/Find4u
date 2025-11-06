<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\LocalizacaoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="localizacao-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'distrito') ?>

    <?= $form->field($model, 'concelho') ?>

    <?= $form->field($model, 'freguesia') ?>

    <?= $form->field($model, 'moradacompleta') ?>

    <?php // echo $form->field($model, 'porta') ?>

    <?php // echo $form->field($model, 'escolas') ?>

    <?php // echo $form->field($model, 'transportes') ?>

    <?php // echo $form->field($model, 'supermercados') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
