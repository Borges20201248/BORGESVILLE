<?php
include 'conexao.php';
include 'funcoes.php'; 

try {
    $fones = processarEFiltrarProdutos($pdo, 4);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>
<?php include 'header.php'; ?>

    <div class="content">
        
        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Fones e Sistemas de Áudio</h2>
                <p>Alta fidelidade sonora e monitoramento profissional</p>
            </div>
            <div class="produtos-wrapper">
                <?php if (empty($fones)): ?>
                    <p style="color: #ffffff; opacity: 0.7;">Nenhum equipamento de áudio cadastrado no momento.</p>
                <?php else: ?>
                    <?php foreach ($fones as $prod): ?>
                        <div class="product-card">
                            <div class="product-image-wrapper" style="height: 320px !important; padding: 0; overflow: hidden; background: none; border: none;">
                                <img src="<?php echo htmlspecialchars($prod['imagem']); ?>" alt="<?php echo htmlspecialchars($prod['nome']); ?>" style="width: 100%; height: 100%; object-fit: contain; background-color: #151515; border-radius: 4px;">
                            </div>
                            <div class="product-info">
                                <div class="product-title"><?php echo htmlspecialchars($prod['nome']); ?></div>
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