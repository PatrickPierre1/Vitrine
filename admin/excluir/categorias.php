<?php
if(!isset($id)) {
    
    $sql = "SELECT FROM `categoria` WHERE id = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $id = $consulta->id;

    echo "<script>window.location.href='listar/categorias'</script>";
    exit;
}else {
    $sql = "DELETE FROM `categoria` WHERE id = :id";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":id", $id);
    $consulta->execute();

    echo "<script>window.location.href='listar/categorias'</script>";
    exit;
}
