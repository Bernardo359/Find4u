<?php
    namespace console\controllers;

    use Yii;
    use yii\console\Controller;


    class RbacController extends Controller
    {
        public function actionInit()
        {
            $auth = Yii::$app->authManager;

            //Limpar todas as regras, roles e permissões anteriores
            $auth->removeAll();
            echo "RBAC limpo.\n";

            //CRIAR PERMISSÕES
            //Criar Anúncio
            $createAnnouncement = $auth->createPermission('createAnnouncement');
            $createAnnouncement->description = "Criar anúncio";
            $auth->add($createAnnouncement);
            echo "Permissão '$createAnnouncement' criada com sucesso!!";

            //Editar anúncio
            $editAnnouncement = $auth->createPermission('editAnnouncement');
            $editAnnouncement->description = "Editar Anúncio";
            $auth->add($editAnnouncement);
            echo "Permissão '$editAnnouncement' criada com sucesso!!";

            //Apagar anúncio
            $deleteAnnouncement = $auth->createPermission('deleteAnnouncement');
            $deleteAnnouncement->description = "Apagar Anúncio";
            $auth->add($deleteAnnouncement);
            echo "Permissão '$deleteAnnouncement' criada com sucesso!!";

            

        }
    }


?>