<?php
include 'conexao.php';
include 'funcoes.php'; 

try {
    $sql_prod = "SELECT p.*, c.nome AS nome_categoria 
                 FROM produtos p 
                 INNER JOIN categorias c ON p.id_categoria = c.id 
                 WHERE c.nome IN ('Fones', 'Áudio', 'Sistemas de Áudio')
                 ORDER BY p.id DESC";
                 
    $stmt_prod = $pdo->query($sql_prod);
    $all_produtos = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);

    $produtos = processarEFiltrarProdutos($all_produtos, 'Fones');

} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>
<?php include 'header.php'; ?>

    <div class="content fones-container">
        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Sistemas de Áudio de Alta Fidelidade (Hi-Fi)</h2>
                <p>Drivers magnéticos planares e cancelamento de ruído cirúrgico para audiófilos intransigentes.</p>
            </div>

            <div class="produtos-wrapper d-flex justify-content-center flex-wrap gap-4">
                <?php if (empty($produtos)): ?>
                    <p style="color: #ffffff; opacity: 0.7;">Nenhum sistema de áudio catalogado no momento.</p>
                <?php else: ?>
                    <?php foreach ($produtos as $prod): ?>
                        <div class="product-card">
                            <div class="product-image-wrapper" style="overflow: hidden; height: 250px;">
                                <img src="<?php echo htmlspecialchars($prod['imagem']); ?>" alt="<?php echo htmlspecialchars($prod['nome']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="product-info">
                                <div class="product-title"><?php echo htmlspecialchars($prod['nome']); ?></div>
                                <div class="product-details"><?php echo htmlspecialchars($prod['descricao']); ?></div>
                                <div class="product-price">R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>