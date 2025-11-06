<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Visita $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'datahoraagenda')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datacriacao')->textInput() ?>

    <?= $form->field($model, 'userprofileid')->textInput() ?>

    <?= $form->field($model, 'anuncioid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
