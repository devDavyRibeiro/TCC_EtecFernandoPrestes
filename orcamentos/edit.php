<?php
include "funcoes.php";
include HEADER_TEMPLATE;
if (empty($_GET['i'])) {
    header("Location: index.php");
}

$vId = base64_decode($_GET['i']);
$vValue = editar($vId);
$vNome = NomeCliente($vId);
?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Edição do Orçamento: <?php echo $vNome; ?></h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post">
        <div class="row">
            <div class="mb-3 col-11">
                <label for="pag" class="form-label">Pagamento Concluído?</label>
                <select class="form-select" name="conclupag" id="pag" onchange="ReadOnlyData()">
                    <?php if ($vValue['conclupag_orcamento'] == "n"): ?>
                        <option selected value="n">Não</option>
                        <option value="s">Sim</option>
                    <?php else: ?>
                        <option value="n">Não</option>
                        <option selected value="s">Sim</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <?php 
            if (is_null($vValue['entrega_orcamento'])) {
                $vEntrega = null;    
            } 
            else{
                $vEntrega = formataData($vValue['entrega_orcamento'],"d/m/Y");
            }
            ?>
            <div class="mb-3 col-11">
                <label for="data">Data de Entrega</label>
                <input type="date" name="entrega" class="form-control" id="data"
                <?php if($vValue['conclupag_orcamento'] == "n"): ?>readonly <?php endif; ?>  value="<?php echo $vEntrega ?>">
            </div>
        </div>

            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label">Número de Parcelas</label>
                    <input type="number" class="form-control" name="parcelas" value="<?php echo $vValue['parcelas_orcamento']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Valor</label>
                    <input type="number" class="form-control" name="valorTotal" value="<?php echo $vValue['valorTotal_orcamento'] ?>" required min="0">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="form-label">Forma de Pagamento</label>
                    <select class="form-select" name="formapag">
                        <?php if ($vValue['formapag_orcamento'] == "Pix") : ?>
                            <option selected value="Pix">Pix</option>
                            <option value="Cartão de Crédito">Cartão de crédito</option>
                            <option value="Transferência">Transferência</option>
                        <?php elseif ($vValue['formapag_orcamento'] == "Cartão de Crédito") : ?>
                            <option value="Pix">Pix</option>
                            <option selected value="Cartão de Crédito">Cartão de crédito</option>
                            <option value="Transferência">Transferência</option>
                        <?php else : ?>
                            <option value="Pix">Pix</option>
                            <option value="Cartão de Crédito">Cartão de crédito</option>
                            <option selected value="Transferência">Transferência</option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div>
                    <button type="submit" class="btn buttone text-center">Salvar</button>
                    <a href="../index.php" type="reset" class="btn buttond2 text-center">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    <br>
</div>
<?php include FOOTER_TEMPLATE; ?>