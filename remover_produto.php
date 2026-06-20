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

        $mensagem = "<div style='color: #0f5132; background-color: #d1e7dd; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Produto removido com sucesso!</div>";
    } catch (PDOException $e) {
        $mensagem = "<div style='color: #842029; background-color: #f8d7da; padding: 15px; border-radius: 4px; margin-bottom: 20px;'>Erro: " . $e->getMessage() . "</div>";
    }
}

$sql_produtos = "SELECT p.id, p.nome, p.preco, c.nome AS categoria 
                 FROM produtos p 
                 INNER JOIN categorias c ON p.id_categoria = c.id 
                 ORDER BY p.id DESC";
$produtos = $pdo->query($sql_produtos)->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'header.php'; ?>

<div class="content" style="max-width: 800px; color: #ffffff; background-color: #151515; padding: 30px; border-radius: 8px; margin: 50px auto; font-family: sans-serif;">
    <h2 style="color: #ffc107; text-align: center; margin-bottom: 20px;">Gerenciar / Remover Produtos</h2>
    
    <?php echo $mensagem; ?>

    <?php if (empty($produtos)): ?>
        <p style="text-align: center; opacity: 0.6;">Nenhum produto cadastrado no momento.</p>
    <?php else: ?>
        <table style="width: 100%; color: #fff; border-collapse: collapse; margin-top: 20px;">
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
                            <a href="remover_produto.php?excluir=<?php echo $prod['id']; ?>" 
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