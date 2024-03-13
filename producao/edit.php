<?php
include "funcoes.php";
include HEADER_TEMPLATE;

if (empty($_GET['i'])) {
    header("Location: ../index.php");
}
$vId = base64_decode($_GET['i']);
$vValue = editar($vId);
$vF = null; 
if (isset($_GET['f'])) {
    $vF = $_GET['f'];
}
?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Edição da produção: <?php echo $vNome; ?></h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post">
            <br>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Material do Pedido</label>
                    <input type="text" class="form-control" name="material" value="<?php echo $vValue['material_orcamento_produto'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Serviço a Ser Prestado</label>
                    <input type="text" class="form-control" name="servico" value="<?php echo $vValue['servico_orcamento_produto'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Medidas</label>
                    <textarea name="medida" class="form-control" id="" cols="30" rows="5"  placeholder="Medida do Frontão: 20cm... "> <?php echo $vValue['medida_orcamento_produto'] ?></textarea>
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