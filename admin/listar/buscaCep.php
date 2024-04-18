<?php
$cep = $_POST["cep"] ?? NULL;


if ($_POST) {
    $url = "https://viacep.com.br/ws/$cep/json/";
    $dados = json_decode(file_get_contents($url));
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
                <td><?= $dados->logradouro ?></td>
                <td><?= $dados->bairro ?></td>
                <td><?= $dados->localidade ?></td>
                <td><?= $dados->uf ?></td>
            </tr>
        </tbody>
    </table>
<?php 
}
?>