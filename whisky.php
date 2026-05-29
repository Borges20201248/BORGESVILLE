<?php
$whiskies = [
    [
        "nome" => "Johnnie Walker Gold Label Reserve",
        "preco" => "349,90",
        "imagem" => "imagens/gold-label.jpg"
    ],
    [
        "nome" => "The Macallan Double Cask 12 Anos",
        "preco" => "785,00",
        "imagem" => "imagens/macallan-12.jpg"
    ],
    [
        "nome" => "Chivas Regal XV 15 Anos",
        "preco" => "299,90",
        "imagem" => "imagens/chivas-15.jpg"
    ],
    [
        "nome" => "Jack Daniel's Single Barrel",
        "preco" => "249,00",
        "imagem" => "imagens/jack-single.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE - Whiskys</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOGO</div>
        </div>
        <nav class="nav-links">
            <a href="index.php">Início</a>
            <a href="WHISKY.PHP" style="color: #d49a5b;">Whiskys</a>
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
        <div class="titulo-pagina">
            <h2>Nossa Seleção Exclusiva</h2>
            <p>Explore os rótulos mais refinados e escolha o seu próximo brinde</p>
        </div>

        <div class="whisky-grid">
            <?php foreach ($whiskies as $whisky): ?>
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="<?php echo $whisky['imagem']; ?>" alt="<?php echo $whisky['nome']; ?>">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title"><?php echo $whisky['nome']; ?></h3>
                        <p class="whisky-price-tag">R$ <?php echo $whisky['preco']; ?></p>
                        <a href="#" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>