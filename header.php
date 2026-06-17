<?php
$pagina_atual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=25.0">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="border-bottom: 2px solid #d49a5b; min-height: 70px;">
    <div class="container-fluid px-4">
        <div class="header-left d-flex align-items-center gap-3">
            <h1 class="brand-name m-0" style="color: #d49a5b; font-weight: 700; font-size: 1.4rem; letter-spacing: 2px;">BORGESVILLE</h1>
            <div class="logo-placeholder" style="border: 1px solid #d49a5b; padding: 2px 6px; font-size: 0.7rem; color: #d49a5b;">LOG</div>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border-color: rgba(212, 154, 91, 0.5);">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <div class="navbar-nav gap-3 text-center my-3 my-lg-0">
                <a class="nav-link text-white fw-semibold text-uppercase <?php echo ($pagina_atual == 'index.php') ? 'active' : ''; ?>" style="font-size: 0.8rem;" href="index.php">INÍCIO</a>
                <a class="nav-link text-white fw-semibold text-uppercase <?php echo ($pagina_atual == 'bebidas.php') ? 'active' : ''; ?>" style="font-size: 0.8rem;" href="bebidas.php">BEBIDAS</a>
                <a class="nav-link text-white fw-semibold text-uppercase <?php echo ($pagina_atual == 'fones.php') ? 'active' : ''; ?>" style="font-size: 0.8rem;" href="fones.php">FONES</a>
                <a class="nav-link text-white fw-semibold text-uppercase <?php echo ($pagina_atual == 'sobre.php') ? 'active' : ''; ?>" style="font-size: 0.8rem;" href="sobre.php">SOBRE</a>
            </div>
        </div>
        
        <div class="text-center pb-3 pb-lg-0">
            <a href="login.php" class="btn-login <?php echo ($pagina_atual == 'login.php') ? 'opacity-50' : ''; ?>" style="color: #d49a5b; text-decoration: none; font-size: 0.8rem; font-weight: 600; text-transform: uppercase;">LOGIN / REGISTRO</a>
        </div>
    </div>
</nav>