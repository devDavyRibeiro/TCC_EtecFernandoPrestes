<?php
include "funcoes.php";
include HEADER_TEMPLATE;

if (!empty($_GET['i'])){
    $vId = base64_decode($_GET['i']);
    form($vId);    
}
else {
    header("Location:selecao.php");
}

$vProdutos = TodosProdutos();
?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Adicionar a Produção</h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post" enctype="multipart/form-data">
            <?php if(is_array($vProdutos)):?>
                <div class="row">
                    <div class="mb-3 col-11">
                        <label>Produto</label>
                        <div class="form-check">
                            <?php foreach($vProdutos as $vValue): ?>
                                <input class="form-check-input" type="radio" name="fk_produto" id="<?php echo $vValue['nome_produto'] ;?>" value="<?php echo $vValue['id_produto']; ?>" >
                                <label class="form-check-label" for="<?php echo $vValue['nome_produto'] ;?>">
                                    <?php echo $vValue['nome_produto']; ?>
                                </label>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Material do Pedido</label>
                    <input type="text" class="form-control" name="material" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Serviço a Ser Prestado</label>
                    <input type="text" class="form-control" name="servico" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Medidas</label>
                    <textarea name="medida" class="form-control" cols="30" rows="5" placeholder="Medida do Frontão: 20cm... "></textarea>
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