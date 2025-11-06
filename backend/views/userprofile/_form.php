<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Userprofile $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="userprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto')->textInput() ?>

    <?= $form->field($model, 'fotoperfil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contabloqueda')->textInput() ?>

    <?= $form->field($model, 'dataregisto')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
