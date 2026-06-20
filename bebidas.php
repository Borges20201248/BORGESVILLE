<?php
include 'conexao.php';
include 'funcoes.php'; 

try {
    $sql_prod = "SELECT p.*, c.nome AS nome_categoria 
                 FROM produtos p 
                 INNER JOIN categorias c ON p.id_categoria = c.id 
                 WHERE c.nome IN ('Whiskys', 'Vodkas', 'Licores')
                 ORDER BY p.id DESC";
                 
    $stmt_prod = $pdo->query($sql_prod);
    $all_produtos = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);

    $whiskys = processarEFiltrarProdutos($all_produtos, 'Whiskys');
    $vodkas = processarEFiltrarProdutos($all_produtos, 'Vodkas');
    $licores = processarEFiltrarProdutos($all_produtos, 'Licores');

} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>
<?php include 'header.php'; ?>

    <div class="content">
        
        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Whiskys</h2>
                <p>Nossa seleção de Whiskys Premium</p>
            </div>
            <div class="produtos-wrapper">
                <?php if (empty($whiskys)): ?>
                    <p style="color: #ffffff; opacity: 0.7;">Nenhum Whisky cadastrado ou ativo no momento.</p>
                <?php else: ?>
                    <?php foreach ($whiskys as $prod): ?>
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

        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Vodkas</h2>
                <p>As melhores Vodkas importadas e nacionais</p>
            </div>
            <div class="produtos-wrapper" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                <?php if (empty($vodkas)): ?>
                    <p style="color: #ffffff; opacity: 0.7;">Nenhuma Vodka cadastrada ou ativa no momento.</p>
                <?php else: ?>
                    <?php foreach ($vodkas as $prod): ?>
                        <div class="product-card" style="max-width: calc(25% - 15px); flex: 1; min-width: 220px;">
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

        <div class="secao-container">
            <div class="titulo-pagina">
                <h2>Licores</h2>
                <p>Licores finos e artesanais para paladares exigentes</p>
            </div>
            <div class="produtos-wrapper">
                <?php if (empty($licores)): ?>
                    <p style="color: #ffffff; opacity: 0.7;">Nenhum Licor cadastrado ou ativo no momento.</p>
                <?php else: ?>
                    <?php foreach ($licores as $prod): ?>
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