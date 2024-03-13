<?php
include "funcoes.php";
include HEADER_TEMPLATE;

if (!empty($_GET['i'])){
    $vId = base64_decode($_GET['i']);
    form($vId);    
}
else {
    header("Location:../index.php");
}

?>
<br>
<div class="boxcadastro">
    <h1 class="text-center">Data da Visita</h1>
    <hr>
    <div class="formulario container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Descrição</label>
                    <textarea name="descricao" class="form-control" id="" cols="30" rows="5" placeholder="Descricão da Visita"required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-11">
                    <label class="ms-1 form-label ">Data da Visita</label>
                    <input type="datetime-local" class="form-control" name="visita" required>
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