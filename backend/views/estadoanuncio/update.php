<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Estadoanuncio $model */

$this->title = 'Update Estadoanuncio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estadoanuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadoanuncio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
