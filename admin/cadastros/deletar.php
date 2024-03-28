<?php
if (isset($id)) {

    $sql = "DELETE FROM `categoria` WHERE id = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    echo "<script>window.location.href='listar/categorias'</script>";
    exit;
}
