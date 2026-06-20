<?php
require_once 'conexao.php';
require_once 'funcoes.php';
include 'header.php';

try {
    $whiskys = processarEFiltrarProdutos($pdo, 5);
    $vodkas  = processarEFiltrarProdutos($pdo, 6);
    $licores = processarEFiltrarProdutos($pdo, 7);
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}
?>
<div class="content">
    
    <div class="secao-container" style="margin-bottom: 50px;">
        <div class="titulo-pagina">
            <h2>Whiskys</h2>
            <p>Seleção de Whiskys Importados e Nacionais</p>
        </div>
        <div class="produtos-wrapper">
            <?php if (empty($whiskys)): ?>
                <p style="color: #ffffff; opacity: 0.7;">Nenhum whisky cadastrado no momento.</p>
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

    <div class="secao-container" style="margin-bottom: 50px;">
        <div class="titulo-pagina">
            <h2>Vodkas</h2>
            <p>As melhores marcas de vodka para seus drinks</p>
        </div>
        <div class="produtos-wrapper">
            <?php if (empty($vodkas)): ?>
                <p style="color: #ffffff; opacity: 0.7;">Nenhuma vodka cadastrada no momento.</p>
            <?php else: ?>
                <?php foreach ($vodkas as $prod): ?>
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

    <div class="secao-container" style="margin-bottom: 50px;">
        <div class="titulo-pagina">
            <h2>Licores</h2>
            <p>Sabores refinados e licores selecionados</p>
        </div>
        <div class="produtos-wrapper">
            <?php if (empty($licores)): ?>
                <p style="color: #ffffff; opacity: 0.7;">Nenhum licor cadastrado no momento.</p>
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