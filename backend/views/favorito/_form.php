<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Favorito $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="favorito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userprofileid')->textInput() ?>

    <?= $form->field($model, 'anuncioid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
