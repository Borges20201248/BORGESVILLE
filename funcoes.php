<?php
function processarEFiltrarProdutos($pdo, $id_categoria) {
    $sql = "SELECT * FROM produtos WHERE id_categoria = :id_categoria";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_categoria' => $id_categoria]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>