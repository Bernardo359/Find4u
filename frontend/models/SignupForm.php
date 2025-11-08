<?php

namespace frontend\models;

use backend\models\Userprofile;
use Yii;
use yii\base\Model;
use common\models\User;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $contacto;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username','required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['contacto', 'required'],

            ['nome', 'trim'],
            ['nome', 'required'],
            ['nome', 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        if ($user->save()) {
            $userprofile = new Userprofile();
            $userprofile->user_id = $user->id;
            $userprofile->nome = $this->nome;
            $userprofile->contacto = $this->contacto;
            $userprofile->fotoperfil = null;
            $userprofile->contabloqueda = 0;
            $userprofile->dataregisto = date('Y-m-d H:i:s');
            

            if(!$userprofile->save()){
                var_dump($userprofile->errors);
                die;
            }

            //atribui o role comprador 
            $auth = Yii::$app->authManager;
            $compradorRole = $auth->getRole('comprador');
            if ($compradorRole) {
                $auth->assign($compradorRole, $user->id);
            }

            return $user;
        }

        return null;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
