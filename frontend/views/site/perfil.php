<?php

/** @var yii\web\View $this */

$this->title = 'Perfil';


?>

<div class="container">
    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar"><i class="fa fa-user me-1"></i></div>
            <div class="profile-name"><?= Yii::$app->user->identity->username?></div>
            <span class="profile-type"><?= $currentRoleString ?></span>
        </div>

        <div class="info-grid">
            <div class="info-section">
                <h3>Contacto</h3>
                <div class="info-item">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <div class="label">Email</div>
                        <div class="value"><?= Yii::$app->user->identity->email?></div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <div class="label">Telefone</div>
                        <div class="value"><?= $profile->contacto ?></div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <div class="label">Localização</div>
                        <div class="value"><?= $profile->localizacao ?></div>
                    </div>
                </div>
            </div>

            <div class="info-section">
                <h3>Informações da Conta</h3>
                <div class="info-item">
                    <i class="fa-solid fa-calendar"></i>
                    <div>
                        <div class="label">Membro desde</div>
                        <div class="value"><?= $profile->dataregisto ?></div>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fa-solid fa-ban"></i>
                    <div>
                        <div class="label">Conta</div>
                        <div class="value"><?= $blockedInfo ?></div>
                    </div>
                </div>
                <a class="edit" href="#">
                <div class="info-item">
                    
                    <i class="fa-solid fa-user-pen"></i>
                    <div>
                        <div class="label">Editar Perfil</div>
                        <div class="value">Edite os seus dados</div>
                    </div> 
                </div>
                </a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="number">15</div>
                <div class="label">Favoritos</div>
            </div>
            <div class="stat-card">
                <div class="number">42</div>
                <div class="label">Pesquisas</div>
            </div>
            <div class="stat-card">
                <div class="number">8</div>
                <div class="label">Visitas Agendadas</div>
            </div>
            <div class="stat-card">
                <div class="number">3</div>
                <div class="label">Propostas Enviadas</div>
            </div>
        </div>
    </div>
</div>