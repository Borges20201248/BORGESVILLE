<?php include 'header.php'; ?>

    <div class="login-wrapper">
        <div class="auth-container">
            <div class="auth-tabs">
                <button id="tab-login" type="button" class="tab-btn active" onclick="switchTab('login')">Entrar</button>
                <button id="tab-register" type="button" class="tab-btn" onclick="switchTab('register')">Registrar</button>
            </div>

            <form id="form-login" class="auth-form active" action="" method="POST">
                <div class="input-group">
                    <label for="login-email">E-mail</label>
                    <input type="email" id="login-email" name="email" placeholder="seu@email.com" required>
                </div>
                <div class="input-group">
                    <label for="login-senha">Senha</label>
                    <input type="password" id="login-senha" name="senha" placeholder="••••••••" required>
                </div>
                <button type="submit" name="btn_login" class="btn-auth">Entrar</button>
            </form>

            <form id="form-register" class="auth-form" action="" method="POST">
                <div class="input-group">
                    <label for="reg-nome">Nome Completo</label>
                    <input type="text" id="reg-nome" name="nome_registro" placeholder="Seu Nome Completo" required>
                </div>
                <div class="input-group">
                    <label for="reg-email">E-mail</label>
                    <input type="email" id="reg-email" name="email_registro" placeholder="seu@email.com" required>
                </div>
                <div class="input-group">
                    <label for="reg-senha">Senha</label>
                    <input type="password" id="reg-senha" name="senha_registro" placeholder="Crie uma nova senha" required>
                </div>
                <button type="submit" name="btn_register" class="btn-auth">Criar Conta</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>