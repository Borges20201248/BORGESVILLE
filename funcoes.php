<?php

function processarEFiltrarProdutos($pdo, $id_categoria) {
    
    if (empty($id_categoria) || $id_categoria <= 0) {
        return [];
    }

    $sql = "SELECT * FROM produtos WHERE id_categoria = :id_categoria ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_categoria' => $id_categoria]);
    
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$produtos) {
        return [];
    }

    return $produtos;
}