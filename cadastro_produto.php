<?php
include 'conexao.php';
include 'funcoes.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $preco = $_POST['preco'] ?? 0;
    $descricao = $_POST['descricao'] ?? '';
    $imagem = $_POST['imagem'] ?? 'img/default.png';
    $id_categoria = $_POST['id_categoria'] ?? null;
    $tags_selecionadas = $_POST['tags'] ?? [];

    if (!empty($nome) && !empty($preco) && !empty($id_categoria)) {
        try {
            $sql_prod = "INSERT INTO produtos (nome, preco, imagem, descricao, id_categoria) 
                         VALUES (:nome, :preco, :imagem, :descricao, :id_categoria)";
            
            $stmt = $pdo->prepare($sql_prod);
            $stmt->execute([
                ':nome' => $nome,
                ':preco' => $preco,
                ':imagem' => $imagem,
                ':descricao' => $descricao,
                ':id_categoria' => $id_categoria
            ]);

            $id_produto_novo = $pdo->lastInsertId();

            if (!empty($tags_selecionadas)) {
                $sql_tag = "INSERT INTO produto_tags (id_produto, id_tag) VALUES (:id_produto, :id_tag)";
                $stmt_tag = $pdo->prepare($sql_tag);

                foreach ($tags_selecionadas as $id_tag) {
                    $stmt_tag->execute([
                        ':id_produto' => $id_produto_novo,
                        ':id_tag' => $id_tag
                    ]);
                }
            }

            $mensagem = "<div class='alert alert-success'>Produto cadastrado com sucesso!</div>";

        } catch (PDOException $e) {
            $mensagem = "<div class='alert alert-danger'>Erro ao salvar: " . $e->getMessage() . "</div>";
        }
    } else {
        $mensagem = "<div class='alert alert-warning'>Preencha todos os campos obrigatórios.</div>";
    }
}

$categorias = $pdo->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
$tags = $pdo->query("SELECT * FROM tags")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<div class="content container mt-5" style="max-width: 600px; color: #ffffff; background-color: #151515; padding: 30px; border-radius: 8px;">
    <h2 class="mb-4 text-center">Registrar Novo Produto</h2>
    
    <?php echo $mensagem; ?>

    <form action="cadastro_produto.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto *</label>
            <input type="text" class="form-control" id="nome" name="nome" required style="background-color: #222; color: #fff; border: 1px solid #444;">
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço (R$) *</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required style="background-color: #222; color: #fff; border: 1px solid #444;">
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria *</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required style="background-color: #222; color: #fff; border: 1px solid #444;">
                <option value="">Selecione uma categoria</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Caminho da Imagem</label>
            <input type="text" class="form-control" id="imagem" name="imagem" style="background-color: #222; color: #fff; border: 1px solid #444;">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" style="background-color: #222; color: #fff; border: 1px solid #444;"></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label d-block">Tags do Produto</label>
            <?php foreach ($tags as $tag): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo $tag['id']; ?>" id="tag_<?php echo $tag['id']; ?>">
                    <label class="form-check-label" for="tag_<?php echo $tag['id']; ?>">
                        <?php echo htmlspecialchars($tag['nome']); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100" style="background-color: #ffc107; border: none; color: #000; font-weight: bold;">Cadastrar Produto</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>