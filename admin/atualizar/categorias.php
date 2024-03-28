<?php 
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS) ?? NULL;

    if(empty($nome)){
        mensagemErro("Preencha o nome da categoria");
    }
    // se existir o id buscar categoria
    // utilizar o mesmo dos cadastros
    

    $sql = "UPDATE `categoria` SET `id`=':id', `nome`=':nome'";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(':nome', $nome);
    $consulta->bindParam(':id', $id);
    $consulta->execute();

    echo "<script>window.location.href='listar/categorias'</script>";
    exit;
?>

<div class="d-flex justify-content-end align-items-center">
        <a href="listar/categorias" class="btn btn-success">Listar Categorias</a>
</div>

<div class="d-flex justify-content-center align-items-center">
    <form class="form w-25" method="POST" action="">
        <h2 class="text-center">Atualizar Categoria</h2>

        <label for="nome">Nome da categoria</label>
        <input autocomplete="off" class="form-control" type="text" id="nome" name="nome" required><br>

        <input class="form-control btn btn-primary" type="submit" value="Salvar">

    </form>
    
</div>