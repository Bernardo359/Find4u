<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Anuncio;

class CatalogoController extends Controller
{
    public function actionCatalogo()
    {
        // buscar apenas anúncios ativos
        $anuncios = Anuncio::find()
            ->where(['estadoanuncioid' => Anuncio::ESTADO_ATIVO])
            ->orderBy(['datapublicacao' => SORT_DESC])
            ->all();

        return $this->render('catalogo', [
            'anuncios' => $anuncios
        ]);
    }

    public function actionDetalhes($id)
    {
        $anuncio = Anuncio::findOne($id);

        if (!$anuncio) {
            throw new \yii\web\NotFoundHttpException("Anúncio não encontrado.");
        }

        return $this->render('detalhes', [
            'anuncio' => $anuncio
        ]);
    }
}
