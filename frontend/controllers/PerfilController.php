<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Userprofile;
use common\models\User;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class PerfilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function actionProfile()
    {
        $user = Yii::$app->user->identity;
        $auth = Yii::$app->authManager;
        $profile = $user->profile;

        if ($profile->contabloqueda == 0) {
            $blockedInfo = "Esta Ativa";
        } else {
            $blockedInfo = "Esta Bloqueada";
        }

        $currentRole = $auth->getRolesByUser($user->id);
        $currentRoleString = key($currentRole);

        return $this->render('profile', [
            'user' => $user,
            'profile' => $profile,
            'blockedInfo' => $blockedInfo,
            'currentRoleString' => $currentRoleString,
        ]);
    }

    public function actionUpdate($id)
    {
        $profile = UserProfile::findOne(['user_id' => $id]);
        $user = User::findOne($id);

        if ($profile->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->username = $profile->nome; // se você quer sincronizar o nome
            if ($profile->save() && $user->save()) {
                Yii::$app->session->setFlash('success', 'Perfil atualizado com sucesso!');
                return $this->redirect(['perfil/profile']);
            }
        }

        return $this->render('update', [
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Userprofile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested user does not exist.');
    }
}
