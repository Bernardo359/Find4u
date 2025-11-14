<?php

namespace backend\controllers;

use yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
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
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $auth = Yii::$app->authManager;

        $currentRole = $auth->getRolesByUser($model->id);
        $currentRoleString = key($currentRole);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'currentRoleString' => $currentRoleString,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();

        $roleList = [];
        foreach ($roles as $role) {
            $roleList[$role->name] = $role->name;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                if ($model->password_plain) {
                    //cria as hash da pass
                    $model->setPassword($model->password_plain);
                    $model->generateAuthKey($model->password_plain);
                    $model->save();

                    //pega role selecionada no dropdown
                    $assignedRole = $this->request->post('role');

                    //atribui a nova role selecionada
                    $RoleSelecionada = $auth->getRole($assignedRole);
                    if ($RoleSelecionada) {
                        $auth->assign($RoleSelecionada, $model->id);
                    }
                }

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'roleList' => $roleList,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $auth = Yii::$app->authManager;
        $roles = $auth->getRoles();

        $roleList = [];
        foreach ($roles as $role) {
            $roleList[$role->name] = $role->name;
        }

        $currentRole = $auth->getRolesByUser($model->id);
        $currentRoleString = key($currentRole);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $assignedRole = $this->request->post('role');

            //da update na password 
            if($model->password_plain){
                $model->setPassword($model->password_plain);
                $model->generateAuthKey($model->password_plain);
            }


            $firstInfoRole = reset($currentRole);

            //elimina o role atual se ele existir
            if ($firstInfoRole) {
                $auth->revoke($firstInfoRole, $model->id);
            }

            //atribui a nova role selecionada
            $RoleSelecionada = $auth->getRole($assignedRole);
            if ($RoleSelecionada) {
                $auth->assign($RoleSelecionada, $model->id);
            }

            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
            'model' => $model,
            'roleList' => $roleList,
            'currentRoleString' => $currentRoleString,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $roles = Yii::$app->authManager->getRolesByUser($id);
       Yii::$app->authManager->revokeAll($id);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
