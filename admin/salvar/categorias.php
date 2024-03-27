<?php
    $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? NULL;

    $nomeEstaVazio = !empty($nome);
    if($nomeEstaVazio){
        mensagemErro("Preencha o nome da categoria");
    }


    $sql = "INSERT INTO `categoria` (`nome`) VALUES (:nome)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":nome", $nome);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    