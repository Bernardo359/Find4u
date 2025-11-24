<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\UserProfile $profile */
/** @var common\models\User $user */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container">
    <div class="user-profile-form">

        <?php $form = ActiveForm::begin([
            'action' => ['perfil/update', 'id' => $profile->user_id],
            'method' => 'post',
        ]); ?>

        <?= $form->field($profile, 'fotoperfil')->fileInput([
            'accept' => 'image/*',
            'class' => 'form-control'
        ]) ?>

        <?= $form->field($profile, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($profile, 'contacto')->textInput() ?>

        <?= $form->field($profile, 'localizacao')->textInput(['maxlength' => true]) ?>

        <?= $form->field($user, 'email')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>