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

            //======PERMISSOES PARA GESTOR======
            //Criar ????localização????
            $criarlocalizacao = $auth->createPermission('criarlocalizacao');
            $criarlocalizacao->description = "Criar uma localização";
            $auth->add($criarlocalizacao);
            echo "Permissão '$criarlocalizacao' criada com sucesso";
            
            //Editar Localização
            $editarlocalizacao = $auth->createPermission('editarlocalizacao');
            $editarlocalizacao->description = "Editar uma localização";
            $auth->add($editarlocalizacao);
            echo "Permissão '$editarlocalizacao' criada com sucesso";

            //Eliminar Localização
            $eliminarlocalizacao = $auth->createPermission('eliminarlocalizacao');
            $eliminarlocalizacao->description = "Eliminar uma localização";
            $auth->add($eliminarlocalizacao);
            echo "Permissão '$eliminarlocalizacao' criada com sucesso";

            //Eliminar comentário
            $eliminarcomentario = $auth->createPermission('eliminarcomentario');
            $eliminarcomentario->description = "Eliminar uma comentário";
            $auth->add($eliminarcomentario);
            echo "Permissão '$eliminarcomentario' criada com sucesso";

            //Acesso ao DashBoard Backend
            $acessoDashboardBackEnd = $auth->createPermission('acessoDashboardBackEnd');
            $acessoDashboardBackEnd->description = "Acesso a dashboard do Backend";
            $auth->add($acessoDashboardBackEnd);
            echo("Permissao '$acessoDashboardBackEnd' criada com sucesso");

            //Avaliação de Denúncias
            $aprovarDenuncia = $auth->createPermission('aprovarDenuncia');
            $aprovarDenuncia->description = "Acesso a aprovação/reprovação de denúncia";
            $auth->add($aprovarDenuncia);
            echo("Permissao '$aprovarDenuncia' criada com sucesso");

            //PERMISSÕES PARA ADMIN SÓ
            //Criar utilizador
            $criarUtilizador = $auth->createPermission('criarUtilizador');
            $criarUtilizador->description = "Criar Utilizador";
            $auth->add($criarUtilizador);
            echo("Permissao '$criarUtilizador' criada com sucesso");

            //Editar utilizador
            $editarUtilizador = $auth->createPermission('editarUtilizador');
            $editarUtilizador->description = "Editar Utilizador";
            $auth->add($editarUtilizador);
            echo("Permissao '$editarUtilizador' criada com sucesso");

            //Eliminar Utilizador
            $eliminarUtilizador = $auth->createPermission('eliminarUtilizador');
            $eliminarUtilizador->description = "Eliminar Utilizador";
            $auth->add($eliminarUtilizador);
            echo("Permissao '$eliminarUtilizador' criada com sucesso");

            //Eliminar Anúncio
            $eliminarAnuncio = $auth->createPermission('eliminarAnuncio');
            $eliminarAnuncio->description = "Eliminar Anuncio";
            $auth->add($eliminarAnuncio);
            echo("Permissao '$eliminarAnuncio' criada com sucesso");
            
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
            $auth->addChild($comprador, $fazerComentarios); 
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

            //Gestor
            $auth->addChild($gestor, $criarlocalizacao);
            $auth->addChild($gestor, $editarlocalizacao);
            $auth->addChild($gestor, $eliminarlocalizacao);
            $auth->addChild($gestor, $eliminarcomentario);
            $auth->addChild($gestor, $acessoDashboardBackEnd);
            $auth->addChild($gestor, $aprovarDenuncia);

            //admin
            $auth->addChild($admin, $criarUtilizador);
            $auth->addChild($admin, $editarUtilizador);
            $auth->addChild($admin, $eliminarUtilizador);
            $auth->addChild($admin, $eliminarAnuncio);


            //Relacionados
            //O ADMIN NÃO DEVE TER PERMISSÃO PARA TUDO. O ADMIN É UM GESTOR MASTER.
            $auth->addChild($anunciante, $comprador); //Anunciante tem todas as permissões de comprador.
            $auth->addChild($admin, $gestor); //Admin tem todas as permissões que o gestor tem
        }
    }


?>