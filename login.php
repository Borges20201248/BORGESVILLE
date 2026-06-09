<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BORGESVILLE | Conta</title>
    <link rel="stylesheet" href="style.css?v=3.0">
</head>
<body>

    <nav class="navbar">
        <div class="header-left">
            <h1 class="brand-name">BORGESVILLE</h1>
            <div class="logo-placeholder">LOG</div>
        </div>
        <div class="nav-links">
            <a href="index.php">INÍCIO</a>
            <a href="#">WHISKYS</a>
            <a href="#">VODKAS</a>
            <a href="#">LICORES</a>
            <a href="#">SOBRE</a>
        </div>
        <a href="index.php" class="btn-login">VOLTAR</a>
    </nav>

    <div class="content">
        
        <div class="auth-box">
            <div class="auth-tabs">
                <button class="tab-btn active" onclick="switchTab('login-form', this)">Entrar</button>
                <button class="tab-btn" onclick="switchTab('register-form', this)">Registrar</button>
            </div>

            <form id="login-form" class="auth-form active" action="#" method="POST">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" required placeholder="seu@email.com">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required placeholder="••••••••">
                </div>
                <button type="submit" class="btn-auth">Entrar</button>
            </form>

            <form id="register-form" class="auth-form" action="#" method="POST">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" required placeholder="Seu Nome">
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" required placeholder="seu@email.com">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="senha" required placeholder="Nova senha">
                </div>
                <button type="submit" class="btn-auth">Criar Conta</button>
            </form>
        </div>

    </div>

    <script>
        function switchTab(formId, button) {
            document.querySelectorAll('.auth-form').forEach(form => form.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(formId).classList.add('active');
            button.classList.add('active');
        }
    </script>

</body>
</html>