<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'conexao.php';

$mensagem_erro = "";
$mensagem_sucesso = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_register'])) {
    $nome = trim($_POST['nome_registro']);
    $email = trim($_POST['email_registro']);
    $senha = $_POST['senha_registro'];
    $cep = trim($_POST['cep_registro']);
    $estado = $_POST['estado_registro'];
    $endereco = trim($_POST['endereco_registro']);

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $stmt_check = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt_check->execute([':email' => $email]);
        
        if ($stmt_check->rowCount() > 0) {
            $mensagem_erro = "Este e-mail já está cadastrado!";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            $sql_ins = "INSERT INTO usuarios (nome, email, senha, cep, estado, endereco) 
                        VALUES (:nome, :email, :senha, :cep, :estado, :endereco)";
            $stmt_ins = $pdo->prepare($sql_ins);
            $executou = $stmt_ins->execute([
                ':nome' => $nome,
                ':email' => $email,
                ':senha' => $senha_hash,
                ':cep' => $cep,
                ':estado' => $estado,
                ':endereco' => $endereco
            ]);

            if ($executou) {
                $mensagem_sucesso = "Conta criada com sucesso! Faça login para acessar.";
            } else {
                $mensagem_erro = "Erro ao criar conta. Tente novamente.";
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_login'])) {
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        $stmt_login = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
        $stmt_login->execute([':email' => $email]);
        $usuario = $stmt_login->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_logado'] = true;
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];

            header("Location: index.php");
            exit();
        } else {
            $mensagem_erro = "E-mail ou senha incorretos!";
        }
    }
}
?>

<?php include 'header.php'; ?>

    <div class="login-wrapper" style="margin-top: 100px; margin-bottom: 50px;">
        <div class="auth-container">
            
            <?php if (!empty($mensagem_erro)): ?>
                <div class="alert alert-danger text-center mx-3 my-2" role="alert">
                    <?php echo $mensagem_erro; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($mensagem_sucesso)): ?>
                <div class="alert alert-success text-center mx-3 my-2" role="alert">
                    <?php echo $mensagem_sucesso; ?>
                </div>
            <?php endif; ?>

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