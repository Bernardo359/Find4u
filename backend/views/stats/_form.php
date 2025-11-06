<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Stats $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stats-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userprofileid')->textInput() ?>

    <?= $form->field($model, 'anuncioid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
