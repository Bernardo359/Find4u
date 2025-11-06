<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Denuncia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="denuncia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'motivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datadenuncia')->textInput() ?>

    <?= $form->field($model, 'userprofileid')->textInput() ?>

    <?= $form->field($model, 'anuncioid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
