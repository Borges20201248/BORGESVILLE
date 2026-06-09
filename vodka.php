<?php
$vodkas = [
    [
        "nome" => "Absolut Vodka Original",
        "preco" => "99,90",
        "imagem" => "imagens/absolut.jpg"
    ],
    [
        "nome" => "Grey Goose Premium",
        "preco" => "169,00",
        "imagem" => "imagens/grey-goose.jpg"
    ],
    [
        "nome" => "Cîroc Vodka",
        "preco" => "149,90",
        "imagem" => "imagens/ciroc.jpg"
    ],
    [
        "nome" => "Belvedere Pure Vodka",
        "preco" => "199,00",
        "imagem" => "imagens/belvedere.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE - Vodkas</title>
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
            <a href="VODKA.PHP" style="color: #d49a5b;">Vodkas</a>
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
            <h2>Vodkas Premium</h2>
            <p>Pureza e sofisticação para os paladares mais exigentes</p>
        </div>

        <div class="whisky-grid">
            <?php foreach ($vodkas as $vodka): ?>
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="<?php echo $vodka['imagem']; ?>" alt="<?php echo $vodka['nome']; ?>">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title"><?php echo $vodka['nome']; ?></h3>
                        <p class="whisky-price-tag">R$ <?php echo $vodka['preco']; ?></p>
                        <a href="#" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>