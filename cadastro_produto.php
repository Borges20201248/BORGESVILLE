<?php
include 'conexao.php';
include 'funcoes.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $preco = str_replace(',', '.', $_POST['preco']);
    $id_categoria = intval($_POST['id_categoria']);
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];
    $tags_selecionadas = isset($_POST['tags']) ? $_POST['tags'] : [];

    try {
        $pdo->beginTransaction();

        $sql_produto = "INSERT INTO produtos (nome, preco, imagem, descricao, id_categoria) 
                        VALUES (:nome, :preco, :imagem, :descricao, :id_categoria)";
        $stmt = $pdo->prepare($sql_produto);
        $stmt->execute([
            ':nome' => $nome,
            ':preco' => $preco,
            ':imagem' => $imagem,
            ':descricao' => $descricao,
            ':id_categoria' => $id_categoria
        ]);

        $id_produto = $pdo->lastInsertId();

        if (!empty($tags_selecionadas)) {
            $sql_tag = "INSERT INTO produto_tags (id_produto, id_tag) VALUES (:id_produto, :id_tag)";
            $stmt_tag = $pdo->prepare($sql_tag);
            foreach ($tags_selecionadas as $id_tag) {
                $stmt_tag->execute([':id_produto' => $id_produto, ':id_tag' => $id_tag]);
            }
        }

        $pdo->commit();
        $mensagem = "<div style='color: #0f5132; background-color: #d1e7dd; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Produto cadastrado com sucesso!</div>";
    } catch (PDOException $e) {
        $pdo->rollBack();
        $mensagem = "<div style='color: #842029; background-color: #f8d7da; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Erro ao cadastrar: " . $e->getMessage() . "</div>";
    }
}

if (isset($_GET['excluir'])) {
    $id_produto = intval($_GET['excluir']);

    try {
        $sql_delete = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql_delete);
        $stmt->execute([':id' => $id_produto]);

        $mensagem = "<div style='color: #0f5132; background-color: #d1e7dd; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Produto removido com sucesso!</div>";
    } catch (PDOException $e) {
        $mensagem = "<div style='color: #842029; background-color: #f8d7da; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Erro ao remover: " . $e->getMessage() . "</div>";
    }
}

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);
$tags = $pdo->query("SELECT * FROM tags ORDER BY nome ASC")->fetchAll(PDO::FETCH_ASSOC);

$sql_produtos = "SELECT p.id, p.nome, p.preco, c.nome AS categoria 
                 FROM produtos p 
                 INNER JOIN categorias c ON p.id_categoria = c.id 
                 ORDER BY p.id DESC";
$produtos = $pdo->query($sql_produtos)->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<div class="content" style="max-width: 800px; color: #ffffff; background-color: #151515; padding: 30px; border-radius: 8px; margin: 40px auto; font-family: sans-serif;">
    
    <h2 style="color: #ffc107; text-align: center; margin-bottom: 25px;">Painel de Produtos (Borgesville)</h2>
    
    <?php echo $mensagem; ?>

    <h3 style="color: #ffffff; border-bottom: 1px solid #333; padding-bottom: 10px; margin-bottom: 20px;">Registrar Novo Produto</h3>
    
    <form action="cadastro_produto.php" method="POST" style="margin-bottom: 50px;">
        <input type="hidden" name="cadastrar" value="1">

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Nome do Produto *</label>
            <input type="text" name="nome" required style="width: 100%; padding: 10px; background-color: #222; border: 1px solid #444; color: #fff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Preço (R$) *</label>
            <input type="text" name="preco" required style="width: 100%; padding: 10px; background-color: #222; border: 1px solid #444; color: #fff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Categoria *</label>
            <select name="id_categoria" required style="width: 100%; padding: 10px; background-color: #222; border: 1px solid #444; color: #fff; border-radius: 4px;">
                <option value="">Selecione uma categoria</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Caminho da Imagem *</label>
            <input type="text" name="imagem" required style="width: 100%; padding: 10px; background-color: #222; border: 1px solid #444; color: #fff; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;">Descrição</label>
            <textarea name="descricao" rows="3" style="width: 100%; padding: 10px; background-color: #222; border: 1px solid #444; color: #fff; border-radius: 4px; resize: vertical;"></textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px;">Tags do Produto</label>
            <div style="display: flex; gap: 15px;">
                <?php foreach ($tags as $tag): ?>
                    <label style="cursor: pointer;">
                        <input type="checkbox" name="tags[]" value="<?php echo $tag['id']; ?>"> <?php echo htmlspecialchars($tag['nome']); ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>

        <button type="submit" style="width: 100%; background-color: #ffc107; color: #000; border: none; padding: 12px; font-weight: bold; border-radius: 4px; cursor: pointer; font-size: 16px;">CADASTRAR PRODUTO</button>
    </form>

    <h3 style="color: #ffc107; border-bottom: 1px solid #333; padding-bottom: 10px; margin-bottom: 20px;">Produtos Cadastrados</h3>

    <?php if (empty($produtos)): ?>
        <p style="text-align: center; opacity: 0.6;">Nenhum produto cadastrado no momento.</p>
    <?php else: ?>
        <table style="width: 100%; color: #fff; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #333; text-align: left;">
                    <th style="padding: 12px;">Nome</th>
                    <th style="padding: 12px;">Categoria</th>
                    <th style="padding: 12px;">Preço</th>
                    <th style="padding: 12px; text-align: center;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $prod): ?>
                    <tr style="border-bottom: 1px solid #222;">
                        <td style="padding: 12px;"><?php echo htmlspecialchars($prod['nome']); ?></td>
                        <td style="padding: 12px;"><?php echo htmlspecialchars($prod['categoria']); ?></td>
                        <td style="padding: 12px;">R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                        <td style="padding: 12px; text-align: center;">
                            <a href="cadastro_produto.php?excluir=<?php echo $prod['id']; ?>" 
                               style="background-color: #dc3545; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 14px;"
                               onclick="return confirm('Tem certeza que deseja remover este produto?');">
                               Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</div>

</body>
</html>