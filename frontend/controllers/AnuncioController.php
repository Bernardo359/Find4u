<?php

namespace frontend\controllers;

use frontend\models\AnuncioForm;
use common\models\Anuncio;
use common\models\AnuncioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;


/**
 * AnuncioController implements the CRUD actions for Anuncio model.
 */
class AnuncioController extends Controller
{
    
    public $layout = 'mainBackOffice';
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Anuncio models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AnuncioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anuncio model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Anuncio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        
        $model = new AnuncioForm();

        if ($model->load(Yii::$app->request->post()) && $model->createAnuncio()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




    /**
     * Updates an existing Anuncio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
        $anuncio = $this->findModel($id);
        $model = new AnuncioForm();
        $model->loadFromModel($anuncio); // preenche os dados existentes no form

        if ($model->load(Yii::$app->request->post()) && $model->updateAnuncio($anuncio)) {
            return $this->redirect(['view', 'id' => $anuncio->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Anuncio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Anuncio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Anuncio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anuncio::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}