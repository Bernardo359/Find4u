<?php

/** @var yii\web\View $this */

$this->title = 'Find4U - BackOffice Anunciante';

?>

    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <!--LOGO Fin4U-->
                <!-- <i class="fas fa-building"></i>
                <span>ImóvelPro</span> -->
                <img src="../../web/templateBack/img/Logo_find4u2.png">
            </div>
        </div>
        <div class="user-profile">
            <div class="user-info">
                <div class="avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <h3>João Silva</h3>
                    <p>Anunciante Premium</p>
                </div>
            </div>
            <button class="new-listing-btn">
                <i class="fas fa-plus"></i>
                Novo Anúncio
            </button>
        </div>

        <div class="menu">
            <div class="menu-section">
                <div class="menu-label">Gestão</div>
                <a href="#" class="menu-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Estatísticas</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-chart-line"></i>
                    <span>Leads</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Agendamentos</span>
                    <span class="badge">2</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-users"></i>
                    <span>Os Meus Imóveis</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="fas fa-comments"></i>
                    <span>Mensagens</span>
                    <span class="badge">5</span>
                </a>    
            </div>
        </div>

        <div class="sidebar-footer">
            <button class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Sair da Conta</span>
            </button>
        </div>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <div>
                <h1>Dashboard</h1>
                <p>Bem-vindo ao seu painel de anunciante</p>
            </div>
            <button class="btn-primary">
                <i class="fas fa-download"></i>
                Exportar Relatório
            </button>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon blue">
                        <i class="fas fa-building"></i>
                    </div>
                    <span class="stat-change positive">+12%</span>
                </div>
                <h3>Imóveis Ativos</h3>
                <p class="stat-value">24</p>
                <span class="stat-label">Total de anúncios publicados</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon green">
                        <i class="fas fa-eye"></i>
                    </div>
                    <span class="stat-change positive">+8%</span>
                </div>
                <h3>Visualizações</h3>
                <p class="stat-value">1,847</p>
                <span class="stat-label">Últimos 30 dias</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon purple">
                        <i class="fas fa-comments"></i>
                    </div>
                    <span class="stat-change negative">-3%</span>
                </div>
                <h3>Mensagens</h3>
                <p class="stat-value">87</p>
                <span class="stat-label">Aguardando resposta: 5</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon orange">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="stat-change positive">+15%</span>
                </div>
                <h3>Novos Leads</h3>
                <p class="stat-value">34</p>
                <span class="stat-label">Esta semana</span>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Visualizações (últimos 7 dias)</h3>
                    <select class="chart-select">
                        <option>7 dias</option>
                        <option>30 dias</option>
                        <option>90 dias</option>
                    </select>
                </div>
                <div class="bar-chart">
                    <div class="bar-item">
                        <div class="bar" style="height: 60%;">
                            <span class="bar-value">120</span>
                        </div>
                        <span class="bar-label">Seg</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar" style="height: 72%;">
                            <span class="bar-value">145</span>
                        </div>
                        <span class="bar-label">Ter</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar" style="height: 49%;">
                            <span class="bar-value">98</span>
                        </div>
                        <span class="bar-label">Qua</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar" style="height: 83%;">
                            <span class="bar-value">167</span>
                        </div>
                        <span class="bar-label">Qui</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar active" style="height: 94%;">
                            <span class="bar-value">189</span>
                        </div>
                        <span class="bar-label">Sex</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar" style="height: 67%;">
                            <span class="bar-value">134</span>
                        </div>
                        <span class="bar-label">Sáb</span>
                    </div>
                    <div class="bar-item">
                        <div class="bar" style="height: 100%;">
                            <span class="bar-value">201</span>
                        </div>
                        <span class="bar-label">Dom</span>
                    </div>
                </div>
            </div>

            <div class="chart-card">
                <h3>Leads por Tipo de Imóvel</h3>
                <div class="progress-chart">
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Apartamento</span>
                            <span class="progress-value">45%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill blue" style="width: 45%;"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Casa</span>
                            <span class="progress-value">30%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill green" style="width: 30%;"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Terreno</span>
                            <span class="progress-value">15%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill purple" style="width: 15%;"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-label">
                            <span>Comercial</span>
                            <span class="progress-value">10%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill orange" style="width: 10%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity & Properties Row -->
        <div class="bottom-grid">
            <div class="activity-card">
                <h3>Atividade Recente</h3>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon blue">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-title">Nova mensagem</p>
                            <p class="activity-subtitle">Apt. Jardim Botânico</p>
                        </div>
                        <span class="activity-time">5 min</span>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon green">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-title">Visualização</p>
                            <p class="activity-subtitle">Casa Ipanema</p>
                        </div>
                        <span class="activity-time">12 min</span>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon purple">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-title">Novo lead</p>
                            <p class="activity-subtitle">Cobertura Leblon</p>
                        </div>
                        <span class="activity-time">1h</span>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon orange">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-title">Agendamento</p>
                            <p class="activity-subtitle">Apt. Copacabana</p>
                        </div>
                        <span class="activity-time">2h</span>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon blue">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-title">Imóvel favoritado</p>
                            <p class="activity-subtitle">Loft Botafogo</p>
                        </div>
                        <span class="activity-time">3h</span>
                    </div>
                </div>
            </div>

            <div class="properties-card">
                <h3>Imóveis em Destaque</h3>
                <div class="properties-list">
                    <div class="property-item">
                        <div class="property-info">
                            <p class="property-name">Cobertura Leblon</p>
                            <div class="property-stats">
                                <span><i class="fas fa-eye"></i> 324 visualizações</span>
                                <span><i class="fas fa-users"></i> 18 leads</span>
                            </div>
                        </div>
                        <span class="property-badge hot">🔥 Quente</span>
                    </div>
                    <div class="property-item">
                        <div class="property-info">
                            <p class="property-name">Apt. Jardim Botânico</p>
                            <div class="property-stats">
                                <span><i class="fas fa-eye"></i> 287 visualizações</span>
                                <span><i class="fas fa-users"></i> 15 leads</span>
                            </div>
                        </div>
                        <span class="property-badge hot">🔥 Quente</span>
                    </div>
                    <div class="property-item">
                        <div class="property-info">
                            <p class="property-name">Casa Ipanema</p>
                            <div class="property-stats">
                                <span><i class="fas fa-eye"></i> 213 visualizações</span>
                                <span><i class="fas fa-users"></i> 12 leads</span>
                            </div>
                        </div>
                        <span class="property-badge warm">⭐ Destaque</span>
                    </div>
                    <div class="property-item">
                        <div class="property-info">
                            <p class="property-name">Apt. Copacabana</p>
                            <div class="property-stats">
                                <span><i class="fas fa-eye"></i> 189 visualizações</span>
                                <span><i class="fas fa-users"></i> 8 leads</span>
                            </div>
                        </div>
                        <span class="property-badge warm">⭐ Destaque</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

