<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Localizacao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="localizacao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'distrito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'concelho')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'freguesia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'moradacompleta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'porta')->textInput() ?>

    <?= $form->field($model, 'escolas')->textInput() ?>

    <?= $form->field($model, 'transportes')->textInput() ?>

    <?= $form->field($model, 'supermercados')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
