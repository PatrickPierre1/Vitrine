<?php
$cep = $_POST["cep"] ?? NULL;

if($_POST) {
    $cep = preg_replace('/\D/', '', $cep);
    $sql = "SELECT * from endereco WHERE cep = :cep";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(":cep", $cep);
    $consulta->execute();
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if(empty($dados)) {
        $cep = preg_replace('/\D/', '', $cep);
        $url = "https://viacep.com.br/ws/$cep/json/";
        $dados = json_decode(file_get_contents($url));
        
        $sql = "INSERT INTO `endereco` (`cep`, `logradouro`, `bairro`, `localidade`, `uf`) VALUES (:cep, :rua, :bairro, :cidade, :estado)";
        $consulta = $pdo->prepare($sql);

        $consulta->bindParam(":cep", $cep);
        $consulta->bindParam(":rua", $dados->logradouro);
        $consulta->bindParam(":bairro", $dados->bairro);
        $consulta->bindParam(":cidade", $dados->localidade);
        $consulta->bindParam(":estado", $dados->uf);

        $consulta->execute();
    }
}

?>

<form class="w-50 pb-5 " action="" method="POST">
    <label class="text-center" for="cep">CEP</label><br>
    <input required class="form-control mb-3" name="cep" type="text" placeholder="Digite o seu CEP (99999-999)">
    <input class="form-control btn btn-success" type="submit" value="Enviar">
</form>

<?php 
if(!empty($dados)){
    
?>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <td>CEP</td>
                <td>Rua</td>
                <td>Bairro</td>
                <td>Cidade</td>
                <td>Estado</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $dados->cep ?></td>
                <td><?= $dados->logradouro?></td>
                <td><?= $dados->bairro?></td>
                <td><?= $dados->localidade?></td>
                <td><?= $dados->uf?></td>
            </tr>
        </tbody>
    </table>
<?php   
}
?>