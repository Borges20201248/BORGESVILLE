<?php
include 'conexao.php';
include 'funcoes.php';

$mensagem = "";

if (isset($_GET['excluir'])) {
    $id_produto = intval($_GET['excluir']);

    try {
        $sql_delete = "DELETE FROM produtos WHERE id = :id";
        $stmt = $pdo->prepare($sql_delete);
        $stmt->execute([':id' => $id_produto]);

        $mensagem = "<div class='alert alert-success'>Produto removido com sucesso!</div>";
    } catch (PDOException $e) {
        $mensagem = "<div class='alert alert-danger'>Erro ao remover produto: " . $e->getMessage() . "</div>";
    }
}

$sql_produtos = "SELECT p.id, p.nome, p.preco, c.nome AS categoria 
                 FROM produtos p 
                 INNER JOIN categorias c ON p.id_categoria = c.id 
                 ORDER BY p.id DESC";
$produtos = $pdo->query($sql_produtos)->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<div class="content container mt-5" style="max-width: 800px; color: #ffffff; background-color: #151515; padding: 30px; border-radius: 8px;">
    <h2 class="mb-4 text-center">Gerenciar / Remover Produtos</h2>
    
    <?php echo $mensagem; ?>

    <?php if (empty($produtos)): ?>
        <p class="text-center text-muted">Nenhum produto cadastrado no momento.</p>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="background-color: #222; color: #fff;">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $prod): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($prod['nome']); ?></td>
                            <td><?php echo htmlspecialchars($prod['categoria']); ?></td>
                            <td>R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></td>
                            <td class="text-center">
                                <a href="remover_produto.php?excluir=<?php echo $prod['id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Tem certeza que deseja remover este produto?');"
                                   style="font-weight: bold;">
                                   Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>