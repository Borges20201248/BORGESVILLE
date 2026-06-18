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

              
                <div class="input-group">
                    <label for="reg-cep">CEP</label>
                    <input type="text" id="reg-cep" name="cep_registro" placeholder="00000-000" maxlength="9" required>
                </div>

      
                <div class="input-group">
                    <label for="reg-estado">Estado</label>
                    <select id="reg-estado" name="estado_registro" required style="width: 100%; background-color: #1A1A1A; border: 1px solid #333; color: #FFF; padding: 10px; border-radius: 4px; appearance: none; -webkit-appearance: none; -moz-appearance: none; background-image: url('data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23fff\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'m2 5 6 6 6-6\'%3e%3c/path%3e%3c/svg%3e'); background-repeat: no-repeat; background-position: right 12px center; background-size: 12px;">
                        <option value="PR" selected>Paraná (PR)</option>
                    </select>
                </div>

               
                <div class="input-group">
                    <label for="reg-endereco">Endereço</label>
                    <input type="text" id="reg-endereco" name="endereco_registro" placeholder="Ex: Rua, Número, Bairro ou Ponto de Referência" required>
                </div>

                <button type="submit" name="btn_register" class="btn-auth">Criar Conta</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>