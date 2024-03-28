<?php
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? NULL;

    if(empty($nome)){
        mensagemErro("Preencha o nome da categoria");
    }
    $id = $_POST['id'];
    if(isset($id)) {

        $sql = "UPDATE `categoria` SET `nome`= :nome WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->bindParam(":nome", $nome);
        $consulta->execute();


        echo "<script>window.location.href='listar/categorias'</script>";
    }

    
    $sql = "SELECT id from categoria where nome = :nome";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if(!empty($dados->id)) {
        mensagemErro("Já existe uma categoria cadastrada!");
    }

    $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->execute();

    echo "<script>window.location.href='listar/categorias'</script>";
    exit;


    