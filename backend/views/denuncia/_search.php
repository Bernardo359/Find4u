<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DenunciaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="denuncia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'datadenuncia') ?>

    <?php // echo $form->field($model, 'userprofileid') ?>

    <?php // echo $form->field($model, 'anuncioid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
