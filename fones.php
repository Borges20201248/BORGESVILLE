<?php
$fones = [
    [
        "nome" => "Fone Bluetooth Premium Over-Ear",
        "preco" => "499,90",
        "imagem" => "imagens/fone-premium.jpg"
    ],
    [
        "nome" => "Fone Noise Cancelling Pro",
        "preco" => "899,00",
        "imagem" => "imagens/fone-noise.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE - Fones</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOGO</div>
        </div>
   <nav class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOGO</div>
        </div>
        <div class="nav-links">
            <a href="index.php" class="active">Início</a>
            <a href="bebidas.php">Bebidas</a>
            <a href="fones.php">Fones</a>
            <a href="sobre.php">Sobre</a>
        </div>
        <a href="login.php" class="btn-login">Login / Registro</a>
    </nav>
        <div class="header-right">
            <a href="#" class="btn-login">Login / Registro</a>
        </div>
    </header>

    <main class="content">
        <div class="titulo-pagina">
            <h2>Eletrônicos & Áudio</h2>
            <p>Sinta cada nota com a nossa linha selecionada de fones de alta fidelidade</p>
        </div>

        <div class="whisky-grid">
            <?php foreach ($fones as $fone): ?>
                <div class="whisky-card">
                    <div class="whisky-image-wrapper">
                        <img src="<?php echo $fone['imagem']; ?>" alt="<?php echo $fone['nome']; ?>">
                    </div>
                    <div class="whisky-details">
                        <h3 class="whisky-title"><?php echo $fone['nome']; ?></h3>
                        <p class="whisky-price-tag">R$ <?php echo $fone['preco']; ?></p>
                        <a href="#" class="btn-detalhes">Ver Detalhes</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>