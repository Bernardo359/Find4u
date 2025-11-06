<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Estadoanuncio $model */

$this->title = 'Create Estadoanuncio';
$this->params['breadcrumbs'][] = ['label' => 'Estadoanuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadoanuncio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
