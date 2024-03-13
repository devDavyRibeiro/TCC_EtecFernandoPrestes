<?php
require "../config.php";
include DATABASE;
include HEADER_TEMPLATE;

valid_admin();
?>
<br>
<div class="boxindexlogin">
    <div class="botoes">
            <h1 class="text-center">Opções</h1>
            <hr>
            <div class="row">
                <div class="col-lg-12 col-md-5 mb-4">
                    <a class="btn glow-on-hover" href="cadastro.php">Novo Produto</a>
                    <a class="btn glow-on-hover" href="leitura.php">Ver todos os Produtos</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include FOOTER_TEMPLATE; ?>