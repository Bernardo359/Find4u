<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */

//,  'readonly' => !$model->isNewRecord - para deixar as TXTs em readonly
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_plain')->passwordInput(['placeholder' => 'Cria/Edita password'])->label("Password") ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::label('Role', 'role') ?>
        <?= Html::dropDownList('role', $currentRoleString ?? null, $roleList ?? [], [
            'class' => 'form-control',
            'prompt' => 'Seleciona uma role para o user',
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>