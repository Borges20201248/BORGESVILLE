<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE | Início</title>
    <link rel="stylesheet" href="style.css?v=21.0">
</head>
<body>

    <nav class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOG</div>
        </div>
        <div class="nav-links">
            <a href="index.php" class="active">INÍCIO</a>
            <a href="bebidas.php">BEBIDAS</a>
            <a href="fones.php">FONES</a>
            <a href="#sobre">SOBRE</a>
        </div>
        <a href="#auth-section" class="btn-login">LOGIN / REGISTRO</a>
    </nav>

    <div class="hero-banner">
        <img src="imagens/banner.jpg" alt="" class="hero-bg-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <span class="hero-tag">Borgesville Heritage</span>
            <h1 class="hero-title">Onde a Tradição Encontra a Alta Fidelidade</h1>
            <p class="hero-subtitle">Uma seleção cirúrgica de destilados nobres e engenharia acústica de vanguarda para quem recusa o comum.</p>
            <div class="hero-buttons">
                <a href="bebidas.php" class="btn-primary">Explorar Bebidas</a>
                <a href="fones.php" class="btn-secondary">Linha de Fones</a>
                <a href="#sobre" class="btn-secondary">Sobre Nós</a>
            </div>
        </div>
    </div>

    <div class="content">
        
        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>A Experiência Borgesville</h2>
                <p>Curadoria rigorosa, importação exclusiva e refinamento absoluto.</p>
            </div>
            <div class="sobre-texto">
                <p>Mais do que uma loja, a Borgesville é um manifesto de estilo de vida. Cada item catalogado em nossas páginas passa por uma inspeção meticulosa de autenticidade, proveniência e performance técnica.</p>
                <p>Seja desfrutando da complexidade sensorial de um malte envelhecido ou isolando-se do mundo com a imersão tridimensional dos nossos sistemas de áudio planares, o nosso foco é entregar o ápice da categoria diretamente à sua porta.</p>
            </div>
        </div>

        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Amostras de Prestígio</h2>
                <p>Uma breve apresentação do padrão de excelência do nosso acervo atual.</p>
            </div>
            <div class="produtos-wrapper">
                <div class="product-card">
                    <div class="product-image-wrapper">Amostra Bebidas</div>
                    <div class="product-info">
                        <div class="product-title">The Royal Reserve 21 Anos</div>
                        <div class="product-details">Edição Limitada em Barris de Xerez.</div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image-wrapper">Amostra Áudio</div>
                    <div class="product-info">
                        <div class="product-title">Acoustic Master Planar-X</div>
                        <div class="product-details">Pureza sonora e palco tridimensional.</div>
                    </div>
                </div>
            </div>
        </div>

        <div id="sobre" class="secao-container" style="scroll-margin-top: 100px;">
            <div class="titulo-pagina">
                <h2>Nossa Herança Comercial</h2>
                <p>Estabelecida sob preceitos de requinte, autenticidade e rigor técnico absoluto.</p>
            </div>
            <div class="sobre-texto">
                <p>A BORGESVILLE nasceu com o objetivo de selecionar e entregar produtos que se destacam pela sua sofisticação e qualidade impecável. Nosso catálogo foi criado sob medida para atender paladares e exigências exclusivas.</p>
                <p>Seja na escolha de um Whisky Single Malt raro ou na precisão acústica de um fone de ouvido de alta fidelidade, garantimos uma experiência premium e totalmente focada na satisfação de nossos clientes.</p>
            </div>
        </div>

        <div id="auth-section" class="login-wrapper" style="scroll-margin-top: 100px;">
            <div class="auth-container">
                <div class="auth-tabs">
                    <button class="tab-btn active" onclick="switchTab('login')">Entrar</button>
                    <button class="tab-btn" onclick="switchTab('register')">Registrar</button>
                </div>

                <form id="login-form" class="auth-form active" action="processar_login.php" method="POST">
                    <div class="input-group">
                        <label for="login-email">E-mail</label>
                        <input type="email" id="login-email" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="input-group">
                        <label for="login-senha">Senha</label>
                        <input type="password" id="login-senha" name="senha" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-auth">Entrar</button>
                </form>

                <form id="register-form" class="auth-form" action="processar_registro.php" method="POST">
                    <div class="input-group">
                        <label for="reg-nome">Nome Completo</label>
                        <input type="text" id="reg-nome" name="nome" placeholder="Seu Nome" required>
                    </div>
                    <div class="input-group">
                        <label for="reg-email">E-mail</label>
                        <input type="email" id="reg-email" name="email" placeholder="seu@email.com" required>
                    </div>
                    <div class="input-group">
                        <label for="reg-senha">Senha</label>
                        <input type="password" id="reg-senha" name="senha" placeholder="Nova senha" required>
                    </div>
                    <button type="submit" class="btn-auth">Criar Conta</button>
                </form>
            </div>
        </div>

    </div>

    <footer style="background-color: #1a1a1a; border-top: 1px solid rgba(212, 154, 91, 0.2); padding: 30px 20px; text-align: center; margin-top: 50px;">
        <p style="color: #d49a5b; font-weight: 700; font-size: 0.9rem; letter-spacing: 1px; margin-bottom: 10px;">BORGESVILLE HERITAGE</p>
        <p style="color: #888888; font-size: 0.75rem;">&copy; 2026 Todos os direitos reservados. Elevando o padrão de sofisticação comercial.</p>
    </footer>

    