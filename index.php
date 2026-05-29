<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOGO</div>
        </div>
        <nav class="nav-links">
            <a href="index.php" style="color: #d49a5b;">Início</a>
            <a href="WHISKY.PHP">Whiskys</a>
            <a href="VODKA.PHP">Vodkas</a>
            <a href="LICORES.PHP">Licores</a>
            <a href="FONES.PHP">Fones</a>
            <a href="SOBRE.PHP">Sobre</a>
        </nav>
        <div class="header-right">
            <a href="#" class="btn-login">Login / Registro</a>
        </div>
    </header>

    <main class="content">
        <section class="product-section">
            <div class="titulo-pagina">
                <h2>Bebidas Premium</h2>
                <p>Nossa coleção move-se automaticamente. Você também pode arrastar para explorar.</p>
            </div>

            <div class="carousel-container" id="carousel">
                <div class="carousel-track" id="track">
                    <div class="product-card-carousel"><img src="bebida1.png" alt="Bebida 1"></div>
                    <div class="product-card-carousel"><img src="bebida2.png" alt="Bebida 2"></div>
                    <div class="product-card-carousel"><img src="bebida3.png" alt="Bebida 3"></div>
                    <div class="product-card-carousel"><img src="bebida4.png" alt="Bebida 4"></div>
                </div>
            </div>
        </section>
        
        <div style="margin: 60px 0; border-bottom: 1px solid rgba(198, 134, 66, 0.15);"></div>

        <section class="product-section-static">
            <div class="titulo-pagina">
                <h2>Eletrônicos & Áudio</h2>
                <p>Qualidade sonora inigualável com nossa linha de fones over-ear</p>
            </div>
            <div class="whisky-grid">
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="imagens/fone-premium.jpg" alt="Fone Bluetooth Premium">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title">Fone Bluetooth Premium Over-Ear</h3>
                        <p class="whisky-price-tag">R$ 499,90</p>
                        <a href="FONES.PHP" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="imagens/fone-noise.jpg" alt="Fone Noise Cancelling Pro">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title">Fone Noise Cancelling Pro</h3>
                        <p class="whisky-price-tag">R$ 899,00</p>
                        <a href="FONES.PHP" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>