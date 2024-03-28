<?php
//função para mostrar a janela de erro
function mensagemErro($msg)
{
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $msg ?>',
        }).then((result) => {
            history.back();
        })
    </script>
<?php

    exit;
} ?>


<?php
//função para mostrar a janela de erro
function mensagemDelete()
{
?>
    <script>
        Swal.fire({
            title: "Deseja deletar?",
            text: "Isso não pode ser desfeito!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Não",
            confirmButtonText: "Sim"
        }).then((result) => {
            if (result.isConfirmed) {
                <?= exit; ?>;
            } else {
                window.location.href = 'listar/categorias';
            }
        });
    </script>
<?php

    exit;
}
