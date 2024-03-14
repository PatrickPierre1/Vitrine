<div class="card">
    <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Nome da Categoria</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM `categoria`";

                        $consulta = $pdo->prepare($sql);
                        $consulta->execute();
                        $dados = $consulta->fetchAll(PDO::FETCH_OBJ);
                        
                        foreach($dados as $dado) {
                    ?>
                        <!-- Criação das TR -->
                        <tr>
                            <td><?= $dado->id?></td>
                            <td><?= $dado->nome?></td>
                        </tr>
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
    </div>
</div>