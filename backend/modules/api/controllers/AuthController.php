<?php

namespace backend\modules\api\controllers;

use yii\rest\Controller;
use common\models\User;
use yii;

/**
 * Default controller for the `api` module
 */
class AuthController extends Controller    
{

    public $modelClass = 'common\models\Userprofile';

    public function actionLogin(){

        //recebe request do post
        $request = Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');

        //verifica se existe
        $user = User::findOne(['username' => $username]);

        //valida se o user e a password estao certas
        if(!$user || !$user->validatePassword($password)){
            return ['error' => 'Credenciais Invalidas'];
        }

        //gera token e salva na bd
        $user->generateAuthKey();
        $user->token_expired_at = time() + 3600;
        $user->save();

        return[
            'success' => true,
            'token' => $user->auth_key,
            'user_id' => $user->id,
            'status' => $user->status,
        ];
    }
}
