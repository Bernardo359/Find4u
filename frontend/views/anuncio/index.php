<?php

use common\models\Anuncio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var common\models\AnuncioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Anuncios';
?>
<div class="anuncio-index">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h4 text-dark"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Criar Anuncio', ['create'], ['class' => 'btn btn-outline-primary btn-sm']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover table-sm align-middle mb-0'],
        'summaryOptions' => ['class' => 'text-muted small mb-3'],
        'filterRowOptions' => ['class' => 'table-active'],
        'rowOptions' => function($model, $key, $index, $grid) {
            return ['class' => $index % 2 === 0 ? '' : 'table-light']; // linhas alternadas suaves
        },
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class,
            'firstPageLabel' => 'Primeiro',
            'lastPageLabel' => 'Último',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['class' => 'text-muted']],

            [
                'attribute' => 'titulo',
                'headerOptions' => ['class' => 'text-dark'],
                'contentOptions' => ['style' => 'font-weight: 500;'],
                'filterInputOptions' => ['class' => 'form-control form-control-sm', 'placeholder' => 'Filtrar título'],
            ],
            [
                'attribute' => 'descricao',
                'format' => 'ntext',
                'value' => function($model) {
                    return strlen($model->descricao) > 50 ? substr($model->descricao,0,50).'...' : $model->descricao;
                },
                'contentOptions' => ['style' => 'max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'],
                'filterInputOptions' => ['class' => 'form-control form-control-sm', 'placeholder' => 'Filtrar descrição'],
            ],
            [
                'attribute' => 'preco',
                'format' => ['currency', 'EUR'],
                'contentOptions' => ['class' => 'text-end fw-semibold'],
                'headerOptions' => ['class' => 'text-end'],
                'filterInputOptions' => ['class' => 'form-control form-control-sm', 'placeholder' => 'Filtrar preço'],
            ],
            [
                'attribute' => 'tipologia',
                'filterInputOptions' => ['class' => 'form-control form-control-sm', 'placeholder' => 'Filtrar tipologia'],
            ],
            [
                'attribute' => 'datapublicacao',
                'format' => ['date', 'php:d/m/Y'],
                'contentOptions' => ['class' => 'text-muted small'],
                'filterInputOptions' => ['class' => 'form-control form-control-sm', 'type' => 'date'],
            ],

            [
                'class' => ActionColumn::class,
                'contentOptions' => ['style' => 'white-space: nowrap; width: 120px;'],
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'class' => 'btn btn-sm btn-view-custom',
                            'title' => 'Ver',
                            'data-toggle' => 'tooltip',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'class' => 'btn btn-sm btn-update-custom',
                            'title' => 'Editar',
                            'data-toggle' => 'tooltip',
                        ]);
                    },
                    'delete' => function ($url,  $model) {
                        return Html::a('<i class="fas fa-trash-alt"></i>', $url, [
                            'class' => 'btn btn-sm btn-delete-custom',
                            'title' => 'Apagar',
                            'data-confirm' => 'Tem a certeza?',
                            'data-method' => 'post',
                            'data-toggle' => 'tooltip',
                        ]);
                    },

                ],
            ],
        ],
    ]); 
    ?>

</div>

<?php
// Ativar tooltips do Bootstrap
$js = <<<JS
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
JS;
$this->registerJs($js);

