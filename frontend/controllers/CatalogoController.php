<?php

namespace frontend\controllers;

use common\models\Favorito;
use yii\web\Controller;
use common\models\Anuncio;
use common\models\Userprofile;
use yii;
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

    public function actionFavoritos(){
        
    $userprofile = Userprofile::find()
        ->where(['user_id' => Yii::$app->user->identity->id])
        ->one();

    if (!$userprofile) {
        return $this->render('favoritos', [
            'anuncios' => [],
        ]);
    }

    $favoritos = Favorito::find()
        ->select('anuncioid')
        ->where(['userprofileid' => $userprofile->id])
        ->column(); 

    if (empty($favoritos)) {
        return $this->render('favoritos', [
            'anuncios' => [],
        ]);
    }

    $anuncios = Anuncio::find()
        ->where(['id' => $favoritos])
        ->andWhere(['estadoanuncioid' => Anuncio::ESTADO_ATIVO])
        ->orderBy(['datapublicacao' => SORT_DESC])
        ->all();

        return $this->render('favoritos', [
            'anuncios' => $anuncios,
        ]);
    }

    public function actionToggleFavorito($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $userprofile = Userprofile::find()
            ->where(['user_id' => Yii::$app->user->identity->id])
            ->one();

        $favorito = Favorito::find()
            ->where([
                'userprofileid' => $userprofile->id,
                'anuncioid' => $id
            ])
            ->one();

        if ($favorito) {
            $favorito->delete(); // se já existe → remove
        } else {
            $favorito = new Favorito();
            $favorito->userprofileid = $userprofile->id;
            $favorito->anuncioid = $id;
            $favorito->save(); // se não existe → adiciona
        }

        return $this->redirect(Yii::$app->request->referrer);
    }
}
