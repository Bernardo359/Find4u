<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Userprofile $model */


$this->params['breadcrumbs'][] = ['label' => 'Userprofiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userprofile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Perfil</h3>
            <div>
                <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Tem a certeza que deseja apagar este item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

        <div class="card-body">

            <div class="row">
                <!-- Foto -->
                <div class="col-md-4 text-center">
                    <?php if (!empty($model->fotoperfil)): ?>
                        <img src="<?= $model->fotoperfil ?>" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;">
                    <?php else: ?>
                        <img src="/img/user-default.png" class="img-fluid rounded mb-3" style="max-height: 250px; object-fit: cover;">
                    <?php endif; ?>
                </div>

                <!-- Informações -->
                <div class="col-md-8">
                    <h4><?= Html::encode($model->nome) ?></h4>

                    <p class="mb-2"><strong>Contacto:</strong> <?= Html::encode($model->contacto) ?></p>
                    <p class="mb-2"><strong>Cont. Bloqueada:</strong> <?= Html::encode($model->contabloqueda) ?></p>
                    <p class="mb-2"><strong>Data de Registo:</strong> <?= Html::encode($model->dataregisto) ?></p>
                    <p class="mb-2"><strong>Morada: </strong> <?= Html::encode($model->localizacao) ?></p>
                </div>
            </div>

        </div>

    </div>

</div>
