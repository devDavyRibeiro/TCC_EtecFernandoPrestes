<?php
include "funcoes.php";
include HEADER_TEMPLATE;

if (!empty($_GET['i'])) {
    $vId = base64_decode($_GET['i']);
    form($vId);
}
$vClientes = TodosClientes();
?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Data da Visita</h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label">Cliente</label>
                    <select name="fk_cliente" class="form-select">
                        <?php foreach ($vClientes as $vCliente) : ?>
                            <option value="<?php echo $vCliente['id_cliente'] ?>"><?php echo $vCliente['nome_cliente']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Valor do Produto</label>
                    <input type="number" class="form-control" name="valorTotal" required step="5" placeholder="R$00,00">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Número de Parcelas</label>
                    <input type="number" name="parcelas" class="form-control" step="1" min="1" value="1">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-11">
                    <label class="form-label">Forma de Pagamento</label>
                    <select class="form-select" name="formapag">
                        <option selected value="Pix">Pix</option>
                        <option value="Cartão de Crédito">Cartão de crédito</option>
                        <option value="Transferência">Transferência</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div>
                    <button type="submit" class="btn buttone text-center">Criar</button>
                    <a href="../index.php" type="reset" class="btn buttond2 text-center">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>
<?php include FOOTER_TEMPLATE; ?>