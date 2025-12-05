<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Visita $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="visita-form">

    <?php
    $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['/visita/create', 'id' => Yii::$app->request->get('id')]),
        'method' => 'post',
    ]);
    ?>


    <!-- Campo data e hora -->
    <?= $form->field($model, 'datahoraagenda')->input('datetime-local', ['value' => date('Y-m-d\TH:i'),]) ?>

    <!-- Campo notas maior -->
    <?= $form->field($model, 'notas')->textarea(['rows' => 5, 'placeholder' => 'Escreva aqui suas observações...']) ?>

    <!--$form->field($model, 'datacriacao')->textInput() ?>
    
    $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    $form->field($model, 'userprofileid')->textInput() ?> 

    //$form->field($model, 'anuncioid')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>