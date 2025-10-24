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

            //======Permissoes Anunciante====== ?? CRUD ANUNCIO NO FRONT E FRONTBACK ??
            //Criar Anúncio
            $criarAnuncio = $auth->createPermission('criarAnuncio');
            $criarAnuncio->description = "Criar anúncio";
            $auth->add($criarAnuncio);
            echo "Permissão '$criarAnuncio' criada com sucesso!!";

            //Editar anúncio
            $editarAnuncio = $auth->createPermission('editarAnuncio');
            $editarAnuncio->description = "Editar Anúncio";
            $auth->add($editarAnuncio);
            echo "Permissão '$editarAnuncio' criada com sucesso!!";

            //Apagar anúncio
            $eliminarAnuncio = $auth->createPermission('eliminarAnuncio');
            $eliminarAnuncio->description = "Apagar Anúncio";
            $auth->add($eliminarAnuncio);
            echo "Permissão '$eliminarAnuncio' criada com sucesso!!";
            

            //======PERMISSOES BACKFRONT======
            //Acesso a Dashboard
            $acessoDashboard = $auth->createPermission('acessoDashboard');
            $acessoDashboard->description = "Acesso a dashboard da pagina para anunciante";
            $auth->add($acessoDashboard);
            echo("Permissao '$acessoDashboard' criada com sucesso");

            //Visualizar imoveis publicados
            $visualizarImoveisPublicados = $auth->createPermission('visualizarImoveisPublicados');
            $visualizarImoveisPublicados->description = "Visualizar Imoveis Publicados do respetivo user";
            $auth->add($visualizarImoveisPublicados);
            echo("Permissao '$visualizarImoveisPublicados' criada com sucesso");

            //Visualizar Comentarios de cada anuncio
            $visualizarComentariosAnuncio = $auth->createPermission('visualizarComentariosAnuncio');
            $visualizarComentariosAnuncio->description = "VIsualizar comentarios de cada anuncio do respetivo user";
            $auth->add($visualizarComentariosAnuncio);
            echo("Permissao '$visualizarComentariosAnuncio' criada com sucesso");

            //Visualizar Review de cada Anuncio
            $visualizarReviewAnuncio = $auth->createPermission('visualizarReviewAnuncio');
            $visualizarReviewAnuncio->description = "VIsualizar review de cada anuncio do respetivo user";
            $auth->add($visualizarReviewAnuncio);
            echo("Permissao '$visualizarReviewAnuncio' criada com sucesso");

            //Agendar Visita
            $agendarVisita = $auth->createPermission('agendarVisita');
            $agendarVisita->description = "Agendar visitas para o anuncio publicado";
            $auth->add($agendarVisita);
            echo("Permissao '$agendarVisita' criada com sucesso");
            
            //Visualizar Leads
            $visualizarLeads = $auth->createPermission('visualizarLeads');
            $visualizarLeads->description = "Visualizar Leads do anunciante";
            $auth->add($visualizarLeads);
            echo("Permissao '$visualizarLeads' criada com sucesso");

            //============== CRUD Anuncio do backFront ?? ==============

            //Criar Leilao
            $criarLeilao = $auth->createPermission('criarLeilao');
            $criarLeilao->description = "Criar Leilao do anunciante";
            $auth->add($criarLeilao);
            echo("Permissao '$criarLeilao' criada com sucesso");

            //Ver detalhes do leilao
            $verDetalhesLeilao = $auth->createPermission('verDetalhesLeilao');
            $verDetalhesLeilao->description = "Ver detalhes do leilao criado";
            $auth->add($verDetalhesLeilao);
            echo("Permissao '$verDetalhesLeilao' criada com sucesso");

            //======PERMISSOES PARA COMPRADOR/ANUNCIANTE======
            //ver Catalogo 
            $verCatalogo = $auth->createPermission('verCatalogo');
            $verCatalogo->description = "Ver Catálogo";
            $auth->add($verCatalogo);
            echo "Permissão '$verCatalogo' criada com sucesso!!";
            
            //ver Detalhes Anúncio
            $verDetalhesAnuncio = $auth->createPermission('verDetalhesAnuncio');
            $verDetalhesAnuncio->descritoion = "Ver Detalhes Anuncio";
            $auth->add($verDetalhesAnuncio);
            echo "Permissao '$verDetalhesAnuncio' criado com sucesso";

            //Marcar Visita
            $marcarVisita = $auth->createPermission('marcarVisita');
            $marcarVisita->description = "Marcar Visita";
            $auth->add($marcarVisita);
            echo "Permissão '$marcarVisita' criada com sucesso";

            //Fazer Comentarios 
            $fazerComentarios = $auth->createPermission('fazerComentarios');
            $fazerComentarios->descritpion = "Fazer Comentarios";
            $auth->add($fazerComentarios);
            echo "Permissão '$fazerComentarios' criada com sucesso";

            //Fazer Review 
            $fazerReview = $auth->createPermission('fazerReview');
            $fazerComentarios->description = "Fazer Review";
            $auth->add($fazerReview);
            echo "Permissão '$fazerReview' criada com sucesso";

            //Fazer Denuncia
            $fazerDenuncia = $auth->createPermission('fazerDenuncia');
            $fazerDenuncia->description = "Fazer Denuncia";
            $auth->add($fazerDenuncia);
            echo "Permissão '$fazerDenuncia' criada com sucesso";

            //Adicionar Favoritos
            $adicionarFavoritos = $auth->createPermission('adicionarFavoritos');
            $adicionarFavoritos->description = "Adicionar Favoritos";
            $auth->add($adicionarFavoritos);
            echo "Permissão '$adicionarFavoritos' criada com sucesso";

            //Visualizar Favoritos
            $visualizarFavoritos = $auth->createPermission('visualizarFavoritos');
            $visualizarFavoritos->description = "Visualizar Favoritos";
            $auth->add($visualizarFavoritos);
            echo "Permissão '$visualizarFavoritos' criada com sucesso";
            
            //Eliminar Favoritos
            $eliminarFavoritos = $auth->createPermission('eliminarFavoritos');
            $eliminarFavoritos->description = "Eliminar Favoritos";
            $auth->add($eliminarFavoritos);
            echo "Permissão '$eliminarFavoritos' criada com sucesso";
            
            //Ver Perfil
            $verPerfil = $auth->createPermission('verPerfil');
            $verPerfil->description = "Ver Perfil";
            $auth->add($verPerfil);
            echo "Permissão '$verPerfil' criada com sucesso";

            //Participar em Leilão
            $participarLeilao = $auth->createPermission('participarLeilao');
            $participarLeilao->description = "Participar em Leilão";
            $auth->add($participarLeilao);
            echo "Permissão '$participarLeilao' criada com sucesso";
            
            
            //======ROLES======
            $admin = $auth->createRole('admin');
            $auth->add($admin);

            $gestor = $auth->createRole('gestor');
            $auth->add($gestor);
            
            $anunciante = $auth->createRole('anunciante');
            $auth->add($anunciante);

            $comprador = $auth->createRole('comprador');
            $auth->add($comprador);

            echo 'Roles Criados!!!';

            //=====Permissoes->Roles=====
            //==== ???? GESTOR TEM DE TER PERMISSOES DEFINIDAS ???? ====

            //Comprador
            $auth->addChild($comprador, $verCatalogo);
            $auth->addChild($comprador, $verDetalhesAnuncio);
            $auth->addChild($comprador, $marcarVisita);
            $auth->addChild($comprador, $fazerReview);
            $auth->addChild($comprador, $fazerComentarios); //Nao esta na BD - FALAR COM O GONÇAS
            $auth->addChild($comprador, $fazerDenuncia);
            $auth->addChild($comprador, $adicionarFavoritos);
            $auth->addChild($comprador, $visualizarFavoritos);
            $auth->addChild($comprador, $eliminarFavoritos);
            $auth->addChild($comprador, $verPerfil);
            $auth->addChild($comprador, $participarLeilao);
            

            //Anunciante
            $auth->addChild($anunciante, $criarAnuncio);
            $auth->addChild($anunciante, $editarAnuncio);
            $auth->addChild($anunciante, $eliminarAnuncio);
            $auth->addChild($anunciante, $acessoDashboard);
            $auth->addChild($anunciante, $visualizarImoveisPublicados);
            $auth->addChild($anunciante, $visualizarComentariosAnuncio);
            $auth->addChild($anunciante, $visualizarReviewAnuncio);
            $auth->addChild($anunciante, $agendarVisita);
            $auth->addChild($anunciante, $visualizarLeads);
            $auth->addChild($anunciante, $criarLeilao);
            $auth->addChild($anunciante, $verDetalhesLeilao);


            //Relacionados
            $auth->addChild($admin, $comprador); //admin tem todas as permissões de comprador.
            $auth->addChild($admin, $anunciante); //admin tem todas as permissões de anunciante.
            $auth->addChild($anunciante, $comprador); //Anunciante tem todas as permissões de comprador.
        }
    }


?>