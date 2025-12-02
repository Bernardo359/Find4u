<?php

use common\models\Userprofile;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserprofileSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
    <?php foreach ($dataProvider->models as $model): ?>
        <div class="col-md-4"> <!-- 3 cards por linha -->
            <div class="card mb-4 shadow-sm">

                <?php if (!empty($model->fotoperfil)): ?>
                    <img src="<?= $model->fotoperfil ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                <?php else: ?>
                    <img src="/img/user-default.png" class="card-img-top" style="height: 200px; object-fit: cover;">
                <?php endif; ?>

                <div class="card-body">
                    <h5 class="card-title"><strong><?= Html::encode($model->nome) ?></strong></h5>

                    <p class="card-text">
                        Contacto: <?= Html::encode($model->contacto) ?><br>
                        <!-- <strong>Cont. Bloq:</strong> <?= Html::encode($model->contabloqueda) ?> -->
                    </p>

                    <div class="d-flex justify-content-between">
                        <?= Html::a('Ver', ['view', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm']) ?>
                        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data' => [
                                'confirm' => 'Tem a certeza que deseja apagar?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>



</div>
