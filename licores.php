<?php
$licores = [
    [
        "nome" => "Licor Baileys Original Irish Cream",
        "preco" => "119,90",
        "imagem" => "imagens/baileys.jpg"
    ],
    [
        "nome" => "Licor Jägermeister",
        "preco" => "134,90",
        "imagem" => "imagens/jagermeister.jpg"
    ],
    [
        "nome" => "Licor Cointreau Triple Sec",
        "preco" => "159,90",
        "imagem" => "imagens/cointreau.jpg"
    ],
    [
        "nome" => "Licor Licor 43 Cuarenta y Tres",
        "preco" => "179,00",
        "imagem" => "imagens/licor43.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE - Licores</title>
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
            <a href="WHISKY.PHP">Whiskys</a>
            <a href="VODKA.PHP">Vodkas</a>
            <a href="LICORES.PHP" style="color: #d49a5b;">Licores</a>
            <a href="FONES.PHP">Fones</a>
            <a href="SOBRE.PHP">Sobre</a>
        </nav>
        <div class="header-right">
            <a href="#" class="btn-login">Login / Registro</a>
        </div>
    </header>

    <main class="content">
        <div class="titulo-pagina">
            <h2>Licores Finos</h2>
            <p>Sabores complexos e adocicados perfeitos para qualquer momento</p>
        </div>

        <div class="whisky-grid">
            <?php foreach ($licores as $licor): ?>
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="<?php echo $licor['imagem']; ?>" alt="<?php echo $licor['nome']; ?>">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title"><?php echo $licor['nome']; ?></h3>
                        <p class="whisky-price-tag">R$ <?php echo $licor['preco']; ?></p>
                        <a href="#" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>