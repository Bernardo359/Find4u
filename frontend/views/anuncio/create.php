<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\AnuncioForm $model */

$this->title = 'Criar Anúncio';
?>
<div class="anuncio-create max-w-3xl mx-auto">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, // agora passa o AnuncioForm
    ]) ?>

</div>
