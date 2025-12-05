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
        'rowOptions' => function($model) {
            return [
                'onclick' => 'window.location.href="' . Url::to(['view', 'id' => $model->id]) . '"',
                'style' => 'cursor: pointer;',
                'class' => 'table-row-clickable'
            ];
        },
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class,
            'firstPageLabel' => 'Primeiro',
            'lastPageLabel' => 'Último',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'headerOptions' => ['class' => 'text-muted']],

            [
                'label' => 'Foto',
                'format' => 'html',
                'value' => function($model) {

                    // Imagem por defeito
                    $defaultImg = Yii::getAlias('@web') . '/template/img/property-01.jpg';
                    $foto = $defaultImg;

                    // Primeira foto real do anúncio
                    if (!empty($model->fotos) && isset($model->fotos[0]) && !empty($model->fotos[0]->nomefoto)) {
                        $foto = Yii::getAlias('@web') . '/uploads/' . $model->fotos[0]->nomefoto;
                    }

                    return Html::img($foto, [
                        'class' => 'gridview-photo img-thumbnail'
                    ]);
                },
                'contentOptions' => ['style' => 'width:100px;'],
            ],

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
                'attribute' => 'estadoanuncioid',
                'label' => 'Estado',
                'value' => function($model){
                    return $model->estadoanuncio ? $model->estadoanuncio->estado : '_';
                },
                'filter' => \yii\helpers\ArrayHelper::map(
                    \common\models\Estadoanuncio::find()->all(), 
                    'id', 
                    'estado'
                ),
                'filterInputOptions'=> [
                    'class'=>'form-control form-control-sm', 
                    'prompt'=>'Filtrar estado'
                ],
                'contentOptions'=>  ['class'=>'fw-semibold']
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

